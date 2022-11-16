<?php

require("util/connection.php");
require("util/queries.php");
require("templates/add_edit_hall.php");

try {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bid = $_POST["bid"];
    $letter = $_POST["letter"];

    // Ensure letter doesn't alrady exist
    if (check_letter_exists($db, $bid, $letter)) {
      die("letter already exists");
    }

    // Insert hall
    $query = $db->prepare(
      "INSERT INTO `halls`(letter, branchId)
       VALUES (?, ?)"
    );
    $status = $query->execute([
      $letter,
      $bid
    ]);

    $alert_message = $status ? "Added branch successfully" : "Failed to add branch";
  }

  $branches = $db->query("SELECT id, `name` FROM branches");

  // TODO: add an option to preselect hall letter if a branchId is passed with GET
  //       and preselect the correspondent branch
  $page = (new addEditHallLayout())
    ->setBranches($branches);
  if (isset($alert_message))
    $page->alert_message = $alert_message;
  $page->doc();
} catch (PDOException $e) {
  die($e->getMessage());
}
