<?php
require("master.php");

class addTimeSlotLayout extends masterLayout
{
  private $movies, $branches;

  function __construct($movies, $branches)
  {
    $this->movies = $movies;
    $this->branches = $branches;
  }

  function main()
  {
?>
    <div class="container" style="max-width: var(--breakpoint-md);">
      <form method="post">
        <div class="card">
          <h4 class="card-header"> Add time slot </h4>
          <div class="card-body">
            <div class="form-group">
              <label for="branch-input">Movie</label>
              <?php if (isset($this->movies)) { ?>
                <select class="form-control" name="mid" id="movie-input">
                  <option hidden disabled selected value> -- Choose a movie -- </option>
                  <?php foreach ($this->movies as $movie) { ?>
                    <option value="<?= $movie['id'] ?>">
                      <?= $movie['title'] ?>
                    </option>
                  <?php } ?>
                </select>
              <?php } else { ?>
                <input disabled type="text" class="form-control" id="movie-input">
              <?php } ?>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="branch-input">Branch</label>
                <?php if (isset($this->branches)) { ?>
                  <select class="form-control" name="bid" id="branch-input">
                    <option hidden disabled selected value> -- Choose a branch -- </option>
                    <?php foreach ($this->branches as $branch) { ?>
                      <option value="<?= $branch['id'] ?>">
                        <?= $branch['name'] ?>
                      </option>
                    <?php } ?>
                  </select>
                <?php } else { ?>
                  <input disabled type="text" class="form-control" id="branch-input">
                <?php } ?>
              </div>
              <div class="form-group col-md-6">
                <label for="hall-input"> Hall </label>
                <select class="form-control" name="hid" id="hall-input" disabled>
                </select>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Add movie</button>
            </div>
          </div>
        </div>
      </form>
    </div>

  <?php
  }

  function script()
  {
  ?>
    <script>
      $(document).ready(() => {
        $("#branch-input").change((e) => {
          bid = e.target.value
          $.getJSON(`get_halls.php?bid=${bid}`)
            .done((data) => {
              if (data.length === 0) {
                $("#hall-input")
                  .attr("disabled", "disabled")
                  .empty()
                  .append("<option hidden disabled selected value> -- No halls exist -- </option>")
                return
              }
              content = data.map((data) => {
                return `<option value="${data.id}"> ${data.letter} </option>`;
              });
              content.unshift("<option hidden disabled selected value> -- Choose a hall -- </option>")
              $("#hall-input")
                .removeAttr("disabled")
                .empty()
                .append(content);
            })
        })
      })
    </script>
<?php
  }
}
?>