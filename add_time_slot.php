<?php

require("util/connection.php");
require("templates/add_time_slot.php");

try {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO: validate data
    $hid      = $_POST["hid"];
    $mid      = $_POST["mid"];
    $datetime = "$_POST[date] $_POST[time]";

    $query = $db->prepare(
      " INSERT INTO `timeSlots`(`time`, hallId, movieId)
        VALUES (
          STR_TO_DATE(?, '%Y-%m-%d %H:%i'),
          ?,
          ?
        )"
    );
    $query->execute([
      $datetime,
      $hid,
      $mid,
    ]);
  }

  // Fetch to use in the form
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
