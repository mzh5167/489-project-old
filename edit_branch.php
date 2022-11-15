<?php

require("util/connection.php");
require("templates/edit_branch.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  die();
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
  if (!isset($_GET["id"]))
    die("No id was provided");

  try {
    $query = $db->prepare(
      "SELECT `name`, addr
       FROM `branches`
       WHERE id = ?"
    );
    $query->execute([
      $_GET["id"]
    ]);
    // Ensure id exists
    $result = $query->fetch();

    $page = new editBranchLayout($result["name"], $result["addr"]);
    $page->doc();
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}
