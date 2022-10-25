<?php

require("util/connection.php");
require("templates/register.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    // Ensure email doesn't already exist in the data base
    $query = $db->prepare("SELECT email FROM `users` WHERE email=?");
    $query->execute([$_POST["email"]]);
    if ($query->rowCount() != 0) {        // TODO: Use AJAX
      $page = new registerLayout();
      $page->alert_message = "Email already exists";
      $page->doc();
      die();
    }

    // Register customer
    $query = $db->prepare("INSERT INTO `users`(fName, lName, email, birthday, hash)
      VALUES (?, ?, ?, ?, ?)");

    $status = $query->execute([
      $_POST["fName"],
      $_POST["lName"],
      $_POST["email"],
      $_POST["birthday"],
      password_hash($_POST["password"], PASSWORD_DEFAULT)
    ]);

    // TODO: Redirect to home page when users signs in
    $page = new registerLayout();
    $page->alert_message = $status ? "success" : "failure";
    $page->doc();
  } catch (PDOException $e) {
    die($e->getMessage());
  }
} else {
  $page = new registerLayout();
  $page->doc();
}
