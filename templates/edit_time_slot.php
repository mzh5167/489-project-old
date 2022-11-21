<?php
require("master.php");

class editTimeSlotLayout extends masterLayout
{
  private $date, $time,
    $movieTitle, $branchName, $hallLetter;

  function __construct($movieTitle, $branchName, $hallLetter)
  {
    $this->movieTitle = $movieTitle;
    $this->branchName = $branchName;
    $this->hallLetter = $hallLetter;
  }
  function setDateTime($date, $time)
  {
    $this->date = $date;
    $this->time = $time;
  }

  function main()
  {
?>
    <div class="container" style="max-width: var(--breakpoint-md);">
      <form method="post">
        <div class="card">
          <h4 class="card-header"> Edit time slot </h4>
          <div class="card-body">
            <div class="form-group">
              <label for="movie-input">Movie</label>
              <input disabled type="text" class="form-control" id="movie-input" value="<?= $this->movieTitle ?>">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="branch-input">Branch</label>
                <input disabled type="text" class="form-control" id="branch-input" value="<?= $this->branchName ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="hall-input"> Hall </label>
                <input disabled type="text" class="form-control" id="hall-input" value="<?= $this->hallLetter ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="date-input">Time slot date</label>
                <input class="form-control" type="date" name="date" id="date-input" value="<?= $this->date ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="time-input">Time slot time</label>
                <input class="form-control" type="time" name="time" id="time-input" value="<?= $this->time ?>">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Edit time slot</button>
            </div>
          </div>
        </div>
      </form>
    </div>

  <?php
  }
}
?>