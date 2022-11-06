<?php

require("util/connection.php");
require("templates/login.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // TODO: input validation
  try {
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $query = $db->prepare("SELECT hash, id FROM `users` WHERE email=?");

    $status = $query->execute([
      $_POST["email"]
    ]);
    if ($query->rowCount() === 0) {
      $page = new loginLayout();
      $page->alert_message = "Email not found";
      $page->doc();
      die();
    }

    $row = $query->fetch();
    $hash = $row->hash;

    $flag = password_verify($_POST["password"], $hash);

    // TODO: set 'isAdmin' to indicate whether the user is an admin or customer
    if ($flag) {
      session_start();
      $_SESSION['userId'] = $row->id;
    }
    // TODO: Redirect to home page when users signs in
    $page = new loginLayout();
    $page->alert_message =
      ($flag ? "Successfully logged in" : "Email or password is not valid")
      . " $_POST[email]";
    $page->doc();
  } catch (PDOException $e) {
    die($e->getMessage());
  }
} else {
  $page = new loginLayout();
  $page->doc();
}

