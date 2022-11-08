<?php
require("templates/browse_movies.php");
require("util/connection.php");

// TODO: ensure this page is only accessible by admin
try {
  $header = [
    "id" => "ID",
    "title" => "Title",
    "releaseYear" => "Release Year",
    "lang" => "Language",
    "duration" => "Duration",
    "rating" => "Rating",
    "genre" => "Genre"
  ];
  $rows = $db
    ->query("SELECT id, title, releaseYear, lang, duration, rating, genre, `desc` FROM movies");
    // ->fetchAll();
  $page = new browseMoviesLayout($header, $rows);
  $page->doc();
} catch (PDOException $e) {
  die($e->getMessage());
}
