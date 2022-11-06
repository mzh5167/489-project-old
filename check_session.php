<?php
session_start();
if (isset($_SESSION['userId'])) {
  echo "user id is $_SESSION[userId]";
} else {
  echo "no session was found";
}