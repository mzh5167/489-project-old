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
      <form method="post">
        <div class="card">
          <h4 class="card-header">Add movie</h4>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="title-input">Title</label>
                <input class="form-control" type="text" name="title" id="title-input">
              </div>
              <div class="form-group col-md-6">
                <label for="rYear-input">Release year</label>
                <input class="form-control" type="number" name="rYear" id="rYear-input">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="duration-input">Duration</label>
                <input class="form-control" type="time" max="02:00" min="00:00" name="duration" id="duration-input">
              </div>
              <div class="form-group col-md-6">
                <label for="lang-input">Language</label>
                <select class="form-control" name="lang" id="lang-input">
                  <option value="en">English</option>
                  <option value="ar">Arabic</option>
                  <option value="Hu">Hindi</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="rating-input">Rating</label>
                <input class="form-control" type="number" max="5.0" min="0.0" step="0.1" name="rating" id="rating-input">
              </div>

              <!-- <label for="">Rating</label>
          <div class="form-group row px-3">
            <input class="form-control-range col-10" type="range" name="" id="rating-input" max="5" min="0" step="0.1">
            <div id="rating-val" class="col text-center">2.5</div>
          </div> -->
              <div class="form-group col-md-6">
                <label for="genre-input">Genre</label>
                <!-- <input class="col form-control" type="text" name="genre" > -->
                <select class="form-control" name="genre" id="genre-input">
                  <?php
                  foreach (self::$genres as $key => $val) {
                    echo "<option value='$key'>$val</option>";
                  }
                  ?>
                </select>
              </div>
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
}
?>