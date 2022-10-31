<?php
require("master.php");

class salesByBranchLayout extends masterLayout
{
  private $sales_list;

  function __construct($sales_list)
  {
    $this->sales_list = $sales_list;
  }

  function main()
  {
?>
    put branch booking list html code <br>
    You can use $this->sales_list variable <br>
    <?php print_r($this->sales_list) ?>
<?php
  }
}
?>
