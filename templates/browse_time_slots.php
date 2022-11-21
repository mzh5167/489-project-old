<?php
require("master.php");

class browseTimeSlotsLayout extends masterLayout
{
  private $movies;

  function __construct($movies)
  {
    $this->movies = $movies;
  }

  function main()
  {
?>
    <div class="form-group row">
      <label for="movie-input" class="col-form-label col-md-3"> Movie </label>
      <div class="col-md-9">
        <select class="form-control" id="movie-input">
          <option hidden disabled selected value> -- Choose a movie -- </option>
          <?php foreach ($this->movies as $movie) { ?>
            <option value="<?= $movie['id'] ?>">
              <?= $movie['title'] ?>
            </option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div id="ts-table" class="table-responsive" style="display: none;"></div>
  <?php
  }

  function script()
  {
  ?>
    <script>
      newTag = (t, s) => `<${t}> ${s} </${t}>`
      newRow = s => newTag("tr", s)
      newCell = s => newTag("td", s)
      // newRow = s => `<tr> ${s} </tr>`
      // newCell = s => `<td> ${s} </td>`
      header = ["ID", "Branch Name", "Hall letter", "Date", "Time"];

      $(document).ready(() => {
        $("#movie-input").change((e) => {
          mid = e.target.value
          $.getJSON(`get_time_slots.php?mid=${mid}`)
            .done((data) => {
              if (data.length === 0) {
                // TODO: add message to be displayed in case no time slot exists
                $("#ts-table")
                  .css("display", "none")
                return
              }
              // console.log(data)
              content = '<table class="table table-striped">'
              content += newTag(
                "thead",
                newRow(
                  header.map(s => newCell(s)).join(" ")
                )
              );
              content += "<tbody>"
              data.forEach(element => {
                j = element
                content += `<tr>
                  <td> ${element.id} </td>
                  <td> ${element.branchName} </td>
                  <td> ${element.hallLetter} </td>
                  <td> ${element.date} </td>
                  <td> ${element.time} </td>
                </tr>`
              });
              content += '</tbody> </table>'
              $("#ts-table")
                .empty()
                .append(content)
                .css("display", "block")
            })
        })
      })
    </script>
<?php
  }
}
?>