<?php
require("util/connection.php");
require("templates/discover_movies.php");


// TODO: get movies from database
$page = new discoverMoviesLayout(["empty array"]);    // Put movies here
$page->doc();
