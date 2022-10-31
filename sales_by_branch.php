<?php
require("util/connection.php");
require("templates/sales_by_branch.php");

// Ensure request method is get
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
  header("Location: /index_admin.php");
  die();
}

// TODO: get sales from database
$page = new salesByBranchLayout(["this is empty array"]);    // Put sales here
$page->doc();
