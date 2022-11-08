<?php

require("util/time.php");
require("util/connection.php");
require("templates/add_movie.php");

$posters_dir = "assets/posters";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // TODO: input validation
  try {
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $duration = durationToSeconds($_POST["duration"]);
    if ($duration == null) {
      $page = new addMovieLayout();
      $page->alert_message = "Invalid duration format";
      $page->doc();
      die();
    }

    $db->beginTransaction();

    $query = $db->prepare("INSERT INTO `movies`(title, releaseYear, lang, duration, rating, genre, `desc`)
      VALUES (?, ?, ?, ?, ?, ?, ?)");
    $status = $query->execute([
      $_POST["title"],
      $_POST["rYear"],
      $_POST["lang"],
      $duration,
      $_POST["rating"],
      $_POST["genre"],
      $_POST["desc"]
    ]);

    $movie_id = $db
      ->query("SELECT LAST_INSERT_ID() AS id")
      ->fetch(PDO::FETCH_ASSOC)['id'];
    if (!isset($movie_id))
      throw new PDOException("Could not fetch id");

    // TODO: find a better way to provide feedback
    // Image upload
    if (isset($_FILES['poster-img'])) {
      $file = $_FILES['poster-img'];
      if ($file['error'] != UPLOAD_ERR_OK) {
        if ($file['error'] == UPLOAD_ERR_FORM_SIZE)
          die("you have exceeded maximum size");
        echo "error: $file[error] <br>";
        print_r($_FILES);
        die("<br> file was not uploaded properly");
      }

      $accepted_types = ["image/png", "image/jpeg"];
      $type = mime_content_type($file['tmp_name']);
      if (!in_array($type, $accepted_types)) {
        die("Please upload an image not '$type'");
      }

      $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
      $target = "$posters_dir/$movie_id.$ext";
      if (move_uploaded_file($file['tmp_name'], $target)) {
        // echo "uploaded successfully";
      } else {
        die("wasn't uploaded successfully");
      }
    }

    $db->commit();

    $page = new addMovieLayout();
    $page->alert_message = $status ? "Added movie successfully" : "Failed to add movie";
    $page->doc();
  } catch (PDOException $e) {
    $db->rollBack();
    die($e->getMessage());
  }
} else {
  $page = new addMovieLayout();
  $page->doc();
}
