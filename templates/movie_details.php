<?php
$title = "Black Adam";
$desc = "Nearly 5,000 years after he was bestowed with the almighty powers of the Egyptian gods -- and imprisoned just as quickly -- Black Adam is freed from his earthly tomb, ready to unleash his unique form of justice on the modern world.";
$length = "124";
$lang = "English";
$releaseYear = 2017;
$imageLink = "../BLACK-ADAM-1-1.jpg";

$main = function () {
  global $title, $desc, $lang, $length, $releaseYear, $imageLink;
?>
  <div class="row">
    <div class="col-md-3 mb-5 mb-md-0">
      <img class="rounded-lg" src="<?= $imageLink ?>" style="width: 100%;" alt="">
    </div>
    <div class="col">
      <h2 class="text-capitalize text-center"> <?= $title ?> </h2>
      <div class="text-muted text-center mb-5 row">
        <p class="col-4"><?= $lang ?></p>
        <p class="col-4">2:04</p>
        <p class="col-4"><?= $releaseYear ?></p>
      </div>

      <p class="description px-5"><?= $desc ?></p>

      <button class="btn-lg btn-primary float-right">Book</button>
    </div>
  </div>
<?php
};

require("master.php");
?>