<?php
require("master.php");

function consoleLog($msg)
{
  echo "<script>console.log('$msg');</script>";
}

class movieDetailsLayout extends masterLayout
{
  private $movie_title;
  private $desc;
  private $length;
  private $lang;
  private $releaseYear;
  public $imageLink;

  function __construct($movie_title, $desc, $length, $lang, $releaseYear, $imageLink)
  {
    $this->movie_title = $movie_title;
    $this->desc = $desc;
    $this->length = $length;
    $this->lang = $lang;
    $this->releaseYear = $releaseYear;
    $this->imageLink = $imageLink;
  }

  function main()
  {
?>
    <div class="row">
      <div class="col-md-3 mb-5 mb-md-0">
        <img class="rounded-lg" src="<?= $this->imageLink ?>" style="width: 100%;" alt="">
      </div>
      <div class="col">
        <h2 class="text-capitalize text-center"> <?= $this->movie_title ?> </h2>
        <div class="text-muted text-center mb-5 row">
          <p class="col-4"><?= $this->lang ?></p>
          <p class="col-4">2:04</p>
          <p class="col-4"><?= $this->releaseYear ?></p>
        </div>

        <p class="description px-5"><?= $this->desc ?></p>

        <button class="btn-lg btn-primary float-right">Book</button>
      </div>
    </div>
<?php
  }
}
?>