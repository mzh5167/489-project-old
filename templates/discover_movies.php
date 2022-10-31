<?php
require("master.php");

class discoverMoviesLayout extends masterLayout
{
  private $movies;

  function __construct($movies)
  {
    $this->movies= $movies;
  }

  function main()
  {
?>
    put branch booking list html code <br>
    You can use $this->movies variable <br>
    <?php print_r($this->movies) ?>
<?php
  }
}
?>

