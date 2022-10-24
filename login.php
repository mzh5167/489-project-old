<?php

require("util/connection.php");
require("templates/login.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $query = $db->prepare("SELECT hash FROM `users` WHERE email=?");

    $status = $query->execute([
      $_POST["email"]
    ]);
    if ($query->rowCount() === 0) {
      die("email not found");
    }

    $row = $query->fetch();
    // print_r($row);
    $hash = $row->hash;
    // print_r($hash);
    // echo '<br>', ($hash ?? "not defined");

    echo '<br><br>';
    echo (password_verify($_POST["password"], $hash)) ? "success" : "failure";
  } catch (PDOException $e) {
    die($e->getMessage());
  }
} else {
  $page = new loginLayout();
  $page->doc();
}
