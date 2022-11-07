<?php
/**
 * Checks if the given email already exists in the database
 */

require("util/queries.php");
require("util/connection.php");

if (!isset($_GET["q"]))
  die();

echo does_email_exist($db, $_GET["q"]) ? "yes" : "no";
