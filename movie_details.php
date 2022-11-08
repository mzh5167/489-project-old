<?php

require("util/connection.php");
require("templates/movie_details.php");

try {
  if ($_SERVER["REQUEST_METHOD"] !== "GET" || !isset($_GET["id"])) {
    die("No ID was provided");
  }
  $id = $_GET["id"];
  $query = $db->prepare(
    "SELECT title, releaseYear, lang, duration, rating, genre, `desc`
     FROM movies
     WHERE id=?"
  );
  $query->execute([$id]);
  if ($query->rowCount() == 0) {
    die("invalid id");
  }
  $row = $query->fetch();

  $page = new movieDetailsLayout(
    $row['title'],
    $row['desc'],
    $row['duration'],
    $row['lang'],
    $row['releaseYear'],
    "assets/posters/$id.jpg"
  );
  $page->doc();
} catch (PDOException $e) {
  die($e->getMessage());
}
