<?php

require("util/connection.php");
require("templates/browse_branches.php");

try {
  $header = [
    "id" => "ID",
    "name" => "Name",
    "addr" => "Address"
  ];
  $branches = $db->query(
    "SELECT id, `name`, addr
     FROM `branches`"
  );
  $page = new browseBranchesLayout($header, $branches);
  $page->doc();
} catch (PDOException $e) {
  die($e->getMessage());
}
