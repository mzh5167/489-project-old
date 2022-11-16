<?php

function isValidEmail(string $email) : bool {
  return (filter_var($email, FILTER_VALIDATE_EMAIL) !== false);
}

/**
 * Checks whether a password is valid or not
 * 
 * @param string &$message   the error message specifying the issue with the password
 */
function isValidPassword(string $password, string &$message = null) : bool {
  if (strlen($password) < 8) {
    $message = "Password must 8 characters or longer";
    return false;
  }
  if (preg_match("/([^a-z0-9\-_])/i", $password, $matches)) {
    // $message = "Password must only contain English letters, numbers, -, or _";
    $message = "Character " . htmlspecialchars($matches[1]) . " is not allowed";
    return false;
  }
  if (!preg_match("/[a-z]/i", $password)) {
    $message = "Password must contain at least one letter";
    return false;
  }
  if (!preg_match("/\d/i", $password)) {
    $message = "Password must contain at least one number";
    return false;
  }
  if (!preg_match('/^[a-z]/i', $password)) {
    $message = "Password must start with a letter";
    return false;
  }

  $message = null;
  return true;
}
