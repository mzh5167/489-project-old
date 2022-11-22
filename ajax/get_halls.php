<?php

require "../util/connection.php";

if (!isset($_GET["bid"]))
  die();

$query = $db->prepare(
  "SELECT id, letter
     FROM `halls`
     WHERE branchId=?"
);
$query->execute([
  $_GET['bid']
]);

echo json_encode(
  $query->fetchAll(PDO::FETCH_ASSOC)
);
