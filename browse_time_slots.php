<?php

require("util/connection.php");
require("templates/browse_time_slots.php");

try {
  $movies   = $db->query("SELECT id, title FROM movies");
} catch (PDOException $e) {
  $alert_message = $e->getMessage();
} finally {
  $page = new browseTimeSlotsLayout($movies);
  if (isset($alert_message))
    $page->alert_message = $alert_message;
  $page->doc();
}
