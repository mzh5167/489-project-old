<?php

require("util/connection.php");
require("templates/browse_halls.php");

try {
  if ($_SERVER["REQUEST_METHOD"] !== "GET" || !isset($_GET["id"])) {
    die(
      isset($_GET["id"]) ? "only get request is allowed" : "No id was provided"
    );
  }

  $header = [
    "id" => "Hall ID",
    "letter" => "Letter"
  ];

  $query = $db->prepare(
    "SELECT id, letter
     FROM `halls`
     WHERE branchId=?"
  );
  $query->execute([
    $_GET['id']
  ]);

  $page = new browseHallsLayout($header, $query);
  $page->doc();
} catch (PDOException $e) {
  die($e->getMessage());
}
