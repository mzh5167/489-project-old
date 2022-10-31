<?php
require("util/connection.php");
require("templates/branch_booking_list.php");

// Ensure request method is get
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
  header("Location: /index_admin.php");
  die();
}

// TODO: get booking list from database
$page = new branchBookingListLayout(["this is empty array"]);    // Put booking list here
$page->doc();