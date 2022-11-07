<?php

require("util/time.php");
require("util/connection.php");
require("templates/add_movie.php");

$posters_dir = "assets/posters";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // TODO: input validation
  try {
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    // Image upload
    if (isset($_FILES['poster-img'])) {
      $file = $_FILES['poster-img'];
      if ($file['error'] != UPLOAD_ERR_OK) {
        die("file was not uploaded properly");
      }

      $target = "$posters_dir/" . basename($file['name']);
      if (move_uploaded_file($file['tmp_name'], $target)) {
        echo "uploaded successfully";
      } else {
        echo "wasn't uploaded successfully";
      }
    }
    die();

    $duration = durationToSeconds($_POST["duration"]);
    if ($duration == null) {
      $page = new addMovieLayout();
      $page->alert_message = "Invalid duration format";
      $page->doc();
      die();
    }

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

    $page = new addMovieLayout();
    $page->alert_message = $status ? "Added movie successfully" : "Failed to add movie";
    $page->doc();
  } catch (PDOException $e) {
    die($e->getMessage());
  }
} else {
  $page = new addMovieLayout();
  $page->doc();
}
