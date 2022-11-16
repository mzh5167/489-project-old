<?php
require("master.php");
require("addEdit.php");

class addEditBranchLayout extends masterLayout
{
  use addEdit;

  function main()
  {
?>
    <form method="post" class="container" style="max-width: var(--breakpoint-sm);">
      <div class="card">
        <h4 class="card-header"><?= $this->isAdd() ? "Add" : "Edit" ?> branch</h4>
        <div class="card-body">
          <div class="form-group">
            <label for="name-input">Name:</label>
            <input class="form-control" type="text" name="name" id="name-input" <?= $this->insVal("name") ?>>
          </div>
          <div class="form-group">
            <label for="address-input">Address:</label>
            <input class="form-control" type="text" name="addr" id="address-input" <?= $this->insVal("addr") ?>>
          </div>
          <div class="d-flex justify-content-end">
            <input class="btn btn-primary" type="submit" value="<?= $this->isAdd() ? "Add" : "Edit" ?> branch">
          </div>
        </div>
      </div>
    </form>
<?php
  }
}
?>