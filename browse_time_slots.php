<?php

require("util/connection.php");
require("templates/browse_time_slots.php");

try {
  if ($_SERVER["REQUEST_METHOD"] !== "GET" || !isset($_GET["mid"])) {
    die(isset($_GET["mid"]) ?
      "only get request is allowed" :
      "No id was provided");
  }

  $header = [
    "id" => "ID",
    "time" => "Time",
    "bname" => "Branch Name",
    "mtitle" => "Movie"
  ];

  $query = $db->prepare(
    "SELECT timeSlots.id, timeSlots.time,
            halls.letter, branches.name, movies.title
     FROM   `timeSlots`, `movies`, `halls`, `branches`
     WHERE  timeSlots.movieId = movies.id
     AND    timeSlots.hallId = halls.id
     AND    halls.branchId = branches.id
     AND    movies.id = ?"
  );
  $query->execute([
    $_GET['mid']
  ]);

  $page = new browseTimeSlotsLayout($header, $query);
  $page->doc();
} catch (PDOException $e) {
  die($e->getMessage());
}
