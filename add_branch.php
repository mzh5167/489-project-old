<?php

require("util/connection.php");
require("templates/add_branch.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $query = $db->prepare(
      "INSERT INTO `branches`(`name`, addr)
       VALUES (?,?)"
    );
    $status = $query->execute([
      $_POST["name"],
      $_POST["addr"]
    ]);

    $page = new addBranchLayout();
    $page->alert_message = $status ? "Branch was added successfully" : "Failed to add branch";
    $page->doc();
  } catch (PDOException $e) {
    die($e->getMessage());
  }
} else {
  $page = (new addBranchLayout())->doc();
}
