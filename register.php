<?php

require("util/connection.php");
require("util/queries.php");
require("templates/register.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    // TODO: input validation
    // Ensure email does not already exist in the database
    if (does_email_exist($db, $_POST["email"])) {
      $page = new registerLayout();
      $page->alert_message = "Sorry $_POST[email] is already used";
      $page->doc();
      die();
    }
    $query = $db->prepare("INSERT INTO `users`(fName, lName, email, birthday, hash)
      VALUES (?, ?, ?, ?, ?)");

    $status = $query->execute([
      $_POST["fName"],
      $_POST["lName"],
      $_POST["email"],
      $_POST["birthday"],
      password_hash($_POST["password"], PASSWORD_DEFAULT)
    ]);

    $page = new registerLayout();
    $page->alert_message = $status ? "Registered successfully" : "Failed to register";
    $page->doc();
  } catch (PDOException $e) {
    die($e->getMessage());
  }
} else {
  $page = new registerLayout();
  $page->doc();
}
