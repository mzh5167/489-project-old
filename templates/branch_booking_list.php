<?php
require("master.php");

class branchBookingListLayout extends masterLayout
{
  private $booking_list;

  function __construct($booking_list)
  {
    $this->booking_list = $booking_list;
  }

  function main()
  {
?>
    put branch booking list html code <br>
    You can use $this->booking_list variable <br>
    <?php print_r($this->booking_list) ?>
<?php
  }
}
?>

