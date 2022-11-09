<?php
require("master.php");

class addHallLayout extends masterLayout
{
  private $branches;

  function __construct($branches)
  {
    $this->branches = $branches;
  }

  function main()
  {
?>
    <form method="post" class="container" style="max-width: var(--breakpoint-sm);">
      <div class="card">
        <h4 class="card-header">Add Branch</h4>
        <div class="card-body">
          <div class="form-group">
            <label for="letter-input">Letter</label>
            <input type="text" class="form-control" name="letter" id="letter-input">
          </div>
          <div class="form-group">
            <label for="branch-input">Branch</label>
            <select class="form-control" name="bid" id="branch-input">
              <?php foreach ($this->branches as $branch) { ?>
                <option value="<?= $branch['id'] ?>">
                  <?= $branch['name'] ?>
                </option>
              <?php } ?>
            </select>
          </div>
          <div class="d-flex justify-content-end">
            <input class="btn btn-primary" type="submit" value="Add hall">
          </div>
        </div>
      </div>
    </form>

<?php
  }
}
?>