<?php
require("master.php");

class browseHallsLayout extends masterLayout
{
  private $header;
  private $halls;

  function __construct($header, $halls)
  {
    $this->halls = $halls;
    $this->header = $header;
  }

  function main()
  {
?>
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
          <?php foreach ($this->halls as $hall) { ?>
            <tr>
              <?php foreach (array_keys($this->header) as $k) { ?>
                <td><?= $hall[$k] ?></td>
              <?php } ?>
              <td>
                <a href="edit_hallphp?id=<?= $hall['id'] ?>"> Edit </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
<?php
  }
}
?>
