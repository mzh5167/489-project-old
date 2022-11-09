<?php
/* Checks if the given email already exists in the database */
function does_email_exist(PDO $db, string $email): bool
{
  $query = $db->prepare("SELECT id FROM `users` WHERE email=?");
  $query->execute([$email]);
  return $query->rowCount() != 0;
}

/**
 * Checks if the given letter for a hall already exists within the branch
 * 
 * @param int $branchId   specifies which branch to search within
 * @param string $letter  specifies which letter to search for
 */
function check_letter_exists(PDO $db, int $branchId, string $letter): bool
{
  $query = $db->prepare(
    "SELECT id
     FROM `halls`
     WHERE letter=?
     AND branchId=?"
  );
  $query->execute([
    $letter,
    $branchId
  ]);
  return $query->rowCount() != 0;
}
