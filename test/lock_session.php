<?php
session_start();
if (isset($_GET["no-lock"]))
  session_write_close();
sleep(5);
echo "finished";
