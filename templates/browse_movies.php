<?php
require("master.php");

class browseMoviesLayout extends masterLayout
{
  private $movies;
  private $header;

  function __construct($header, $movies)
  {
    $this->movies = $movies;
    $this->header = $header;
  }

  function main()
  {
?>
    <div class="container">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <?php foreach (array_values($this->header) as $cell) { ?>
                <th scope="col"><?= $cell ?></th>
              <?php } ?>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->movies as $movie) { ?>
              <tr>
                <?php foreach (array_keys($this->header) as $k) { ?>
                  <td><?= $movie[$k] ?></td>
                <?php } ?>
                <td>
                  <!-- TODO: Add admin functionalities instead of customer movie_details.php -->
                  <a href="movie_details.php?id=<?= $movie['id'] ?>"> View details </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
<?php
  }
}
?>