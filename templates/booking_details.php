<?php
require("master.php");

class bookingDetailsLayout extends masterLayout
{
  private $booking_details;

  function __construct($booking_details)
  {
    $this->booking_details = $booking_details;
  }

  function main()
  {
?>
    put branch booking list html code <br>
    You can use $this->booking_details variable <br>
    <?php print_r($this->booking_details) ?>
<?php
  }
}
?>

