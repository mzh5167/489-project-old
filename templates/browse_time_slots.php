<?php
require("master.php");

class browseTimeSlotsLayout extends masterLayout
{
  private $movies;

  function __construct($movies)
  {
    $this->movies = $movies;
  }

  function main()
  {
?>
    <div class="form-group row">
      <label for="movie-input" class="col-form-label col-md-3"> Movie </label>
      <div class="col-md-9">
        <select class="form-control" id="movie-input" data-ajax="fetch-time-slots">
          <option hidden disabled selected value> -- Choose a movie -- </option>
          <?php foreach ($this->movies as $movie) { ?>
            <option value="<?= $movie['id'] ?>">
              <?= $movie['title'] ?>
            </option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div id="ts-table" class="table-responsive" style="display: none;"></div>
  <?php
  }
}
?>