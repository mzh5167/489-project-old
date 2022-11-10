<?php
require("master.php");

class browseBranchesLayout extends masterLayout
{
  private $header;
  private $branches;

  function __construct($header, $branches)
  {
    $this->branches = $branches;
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
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->branches as $branch) { ?>
            <tr>
              <?php foreach (array_keys($this->header) as $k) { ?>
                <td><?= $branch[$k] ?></td>
              <?php } ?>
              <td>
                <a href="edit_branch.php?id=<?= $branch['id'] ?>"> Edit </a>
              </td>
              <td>
                <a href="browse_halls.php?id=<?= $branch['id'] ?>"> Browse Halls </a>
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