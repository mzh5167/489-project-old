<?php

require("util/connection.php");
require("templates/register.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $query = $db->prepare("INSERT INTO `users`(fName, lName, email, birthday, hash)
      VALUES (?, ?, ?, ?, ?)");

    echo "<br> $_POST[fName]";
    echo "<br> $_POST[lName]";
    echo "<br> $_POST[birthday]";
    echo "<br> $_POST[email]";
    echo "<br> $_POST[password]";

    $status = $query->execute([
      $_POST["fName"],
      $_POST["lName"],
      $_POST["email"],
      $_POST["birthday"],
      password_hash($_POST["password"], PASSWORD_DEFAULT)
    ]);

    echo '<br><br>';
    echo $status ? "success" : "failure";
  } catch (PDOException $e) {
    die($e->getMessage());
  }
} else {
  $page = new registerLayout();
  $page->doc();
}
