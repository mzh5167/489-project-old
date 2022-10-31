<?php

require("util/connection.php");
require("templates/register.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    // TODO: input validation
    // TODO: check if email already exists
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
