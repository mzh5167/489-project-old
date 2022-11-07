<?php
try {
  $db = new PDO(
    'mysql:host=localhost;dbname=tmp0;charset=utf8',
    'root',
    ''
  );
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // $db = null;
} catch (PDOException $ex) {
  echo "Error Occured <br>";
  die($ex->getMessage());
}
