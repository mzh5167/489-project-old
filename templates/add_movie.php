<?php
require("master.php");

class addMovieLayout extends masterLayout
{
  public static $genres = [
    "drama" => "drama",
    "action" => "action",
    "anim" => "animation",
  ];

  function main()
  {
?>
    <div class="container" style="max-width: var(--breakpoint-md);">
      <form>
        <div class="card">
          <h4 class="card-header">Add movie</h4>
          <div class="card-body">
            <div class="form-group">
              <label for="movie-title">Title</label>
              <input class="form-control" type="text" name="bday" id="movie-title">
            </div>
            <div class="form-group">
              <label for="movie-desc">Release year</label>
              <input class="form-control" type="number" name="bday" id="movie-title">
            </div>
            <div class="form-group">
              <label for="movie-desc">Duration</label>
              <input class="form-control" type="time" max="02:00" min="00:00" name="bday" id="movie-title">
            </div>

            <div class="form-group">
              <label for="rating-input">Rating</label>
              <input class="form-control" type="number" max="5.0" min="0.0" step="0.1" name="rating" id="rating-input">
            </div>

            <!-- <label for="">Rating</label>
          <div class="form-group row px-3">
            <input class="form-control-range col-10" type="range" name="" id="rating-input" max="5" min="0" step="0.1">
            <div id="rating-val" class="col text-center">2.5</div>
          </div> -->
            <div class="form-group">
              <label for="genre-input">Genre</label>
              <!-- <input class="col form-control" type="text" name="genre" > -->
              <select class="form-control" name="genre" id="genre-select">
                <?php
                foreach (self::$genres as $key => $val) {
                  echo "<option value='$key'>$val</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="movie-desc">Description</label>
              <textarea class="form-control" name="desc" id="movie-desc" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Add movie</button>
            </div>
          </div>
        </div>
      </form>
    </div>

<?php
}

require("master.php");
?>