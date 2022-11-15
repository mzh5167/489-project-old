<?php
require("master.php");

class editBranchLayout extends masterLayout
{
  private $name;
  private $address;

  function __construct($name, $address)
  {
    $this->name = $name;
    $this->address = $address;
  }
  function main()
  {
?>
    <form method="post" class="container" style="max-width: var(--breakpoint-sm);">
      <div class="card">
        <h4 class="card-header">Edit branch</h4>
        <div class="card-body">
          <div class="form-group">
            <label for="name-input">Name:</label>
            <input class="form-control" type="text" name="name" id="name-input" value="<?= $this->name ?>">
          </div>
          <div class="form-group">
            <label for="address-input">Address:</label>
            <input class="form-control" type="text" name="addr" id="address-input" value="<?= $this->address ?>">
          </div>
          <div class="d-flex justify-content-end">
            <input class="btn btn-primary" type="submit" value="Edit branch">
          </div>
        </div>
      </div>
    </form>
<?php
  }
}
?>