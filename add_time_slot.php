<?php

require("util/connection.php");
require("templates/add_time_slot.php");

try {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alert_message = "Not implemented";
    return;
  }

  $branches = $db->query("SELECT id, `name` FROM branches");
  $movies   = $db->query("SELECT id, title FROM movies");
} catch (PDOException $e) {
  $alert_message = $e->getMessage();
} finally {
  $page = new addTimeSlotLayout($movies, $branches);
  if (isset($alert_message))
    $page->alert_message = $alert_message;
  $page->doc();
}
