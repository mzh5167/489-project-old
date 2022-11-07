<?php
/* Checks if the given email already exists in the database */
function does_email_exist(PDO $db, string $email) : bool {
  $query = $db->prepare("SELECT id FROM `users` WHERE email=?");
  $query->execute([$email]);
  return $query->rowCount() != 0;
}