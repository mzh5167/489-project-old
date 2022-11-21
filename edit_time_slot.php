<?php

require("util/connection.php");
require("templates/edit_time_slot.php");

try {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alert_message = "Not implemented";
    return;
  }

  if (!isset($_GET["mid"]) || !isset($_GET["hid"]))
    die();
  $mid = $_GET["mid"];
  $hid = $_GET["hid"];


  // Fetch hall and branch info
  $query = $db->prepare(
    ' SELECT  branches.name AS branchName,
              letter AS hallLetter
      FROM    halls, branches
      WHERE   branches.id = branchId
      AND     halls.id = ?'
  );
  $query->execute([ $hid ]);
  $r = $query->fetch();
  // TODO: Ensure result
  $branchName = $r["branchName"];
  $hallLetter = $r["hallLetter"];


  // Fetch movie info
  $query = $db->prepare('SELECT title FROM movies WHERE id = ?');
  $query->execute([ $mid ]);
  $r = $query->fetch();
  $movieTitle = $r["title"];


  // Fetch time slot info
  $query = $db->prepare(
    ' SELECT  DATE_FORMAT(`time`, "%Y-%m-%d") AS `date`,
              DATE_FORMAT(`time`, "%H:%i") as `time`
      FROM    `timeSlots`
      WHERE   hallId = ?
      AND     movieId = ?'
  );
  $query->execute([
    $_GET['hid'],
    $_GET['mid'],
  ]);
  $row = $query->fetch();
} catch (PDOException $e) {
  $alert_message = $e->getMessage();
} finally {
  $page = new editTimeSlotLayout($movieTitle, $branchName, $hallLetter);
  if (isset($row))
    $page->setDateTime(
      $row["date"],
      $row["time"]
    );
  if (isset($alert_message))
    $page->alert_message = $alert_message;
  $page->doc();
}
