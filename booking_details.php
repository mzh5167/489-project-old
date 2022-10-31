<?php
require("util/connection.php");
require("templates/booking_details.php");

// Ensure request method is get
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
  header("Location: /index_admin.php");
  die();
}

// TODO: get booking details from database
$page = new bookingDetailsLayout(["this is empty array"]);    // Put booking details here
$page->doc();