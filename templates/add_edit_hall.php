<?php
require("master.php");
require("addEdit.php");

class addEditHallLayout extends masterLayout
{
  use addEdit;

  private $branches;

  public function setBranches($branches)
  {
    $this->branches = $branches;
    return $this;
  }

  function main()
  {
    if ($this->isAdd() && !isset($this->branches)) {
      die("internal error: no branches were passed");
    }
?>
    <form method="post" class="container" style="max-width: var(--breakpoint-sm);">
      <div class="card">
        <h4 class="card-header"><?= $this->isAdd() ? "Add" : "Edit" ?> Hall</h4>
        <div class="card-body">
          <div class="form-group">
            <label for="letter-input">Letter</label>
            <input type="text" class="form-control" name="letter" id="letter-input" <?= $this->insVal("letter") ?>>
          </div>
          <div class="form-group">
            <label for="branch-input">Branch</label>
            <?php if ($this->isAdd()) { ?>
              <select class="form-control" name="bid" id="branch-input">
                <?php foreach ($this->branches as $branch) { ?>
                  <option value="<?= $branch['id'] ?>">
                    <?= $branch['name'] ?>
                  </option>
                <?php } ?>
              </select>
            <?php } else { ?>
              <input disabled type="text" class="form-control" id="branch-input" <?= $this->insVal("branchName") ?>>
            <?php } ?>
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