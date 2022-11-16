<?php

require("util/connection.php");
require("templates/add_edit_branch.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // TODO
  die("Not implemented");
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
    // TODO: Ensure id exists
    $result = $query->fetch();

    $page = new addEditBranchLayout();
    $page->setValues($result);
    $page->doc();
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}
