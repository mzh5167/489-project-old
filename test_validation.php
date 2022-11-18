<?php

include "util/validation.php";

$tests = [
  ["fcme", false],
  ["0mqudwjqimqw", false],
  ["cmqu%dwjqimqwocmq^", false],
  ["cmqudwjqimqwocmq^", false],
  ["cmq^udwjqimqwocmq^", false],
  ["cmq^udwj%%%qwocmq^", false],
  ["cmqudwjq", false],
  ["cmqudwjq214789", true],
  ["cm-dwjq214___", true],
];

function printCell($content)
{
  echo "<td> $content </td>";
}

echo "<body style='background: black; color: white'> <table style='color: inherit'>";
foreach ($tests as list($test, $val)) {
  echo "<tr>";
  printCell("$test");
  $r = isValidPassword($test, $msg);
  if (!isset($msg))
    $msg = "valid";
  printCell(
    $r === $val ?
      "<span style='color: greenyellow'> $msg </span>" :
      "<span style='color: orangered'>   $msg </span>"
  );
  echo "</tr>";
}
echo "</body> </table>";
