<?php
session_start();

if (empty($_SESSION))
  die("Session is empty");

// var_dump($_SESSION);

// print_r($_SESSION);

//    display: inline-block;
//    width: 4rem;

echo "$_SESSION = [ <ul>";
foreach ($_SESSION as $k => $v) {
  echo "<li> $k => ";
  print_r($v);
  echo "</li>";
}
echo "</ul> ]";
