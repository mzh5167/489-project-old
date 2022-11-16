<?php

require("util/connection.php");
require("util/queries.php");
require("templates/add_edit_hall.php");

try {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO
    die("Not implemented");
  }
  if (!isset($_GET["id"]))
    die("No id was provided");

  $hid = $_GET["id"];

  $query = $db->prepare(
    "SELECT letter, branchId
     FROM `halls`
     WHERE id=?"
  );
  $query->execute([
    $hid
  ]);
  if ($query->rowCount() == 0) {
    die("invalid id");
  }
  $row = $query->fetch();

  $page = (new addEditHallLayout())
    ->setValues($row);
  $page->doc();
} catch (PDOException $e) {
  die($e->getMessage());
}

