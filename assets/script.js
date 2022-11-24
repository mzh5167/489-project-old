/* From browse_time_slots.php */
newTag = (t, s) => `<${t}> ${s} </${t}>`
newRow = s => newTag("tr", s)
newCell = s => newTag("td", s)
// newRow = s => `<tr> ${s} </tr>`
// newCell = s => `<td> ${s} </td>`
header = ["ID", "Branch Name", "Hall letter", "Date", "Time"];

$(document).ready(() => {
  $("#movie-input").change((e) => {
    mid = e.target.value
    $.getJSON(`ajax/get_time_slots.php?mid=${mid}`)
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


/* From add_tims_slot.php */
// TODO: move javascript into a separate file
$(document).ready(() => {
  $("#branch-input").change((e) => {
    bid = e.target.value
    $.getJSON(`ajax/get_halls.php?bid=${bid}`)
      .done((data) => {
        // Ensure halls exist
        if (data.length === 0) {
          $("#hall-input")
            // Disable halls input
            .attr("disabled", "disabled")
            .empty()
            .append("<option hidden disabled selected value> -- No halls exist -- </option>")
          return
        }
        // Convert data to options
        content = data.map((data) => {
          return `<option value="${data.id}"> ${data.letter} </option>`;
        })
        content.unshift("<option hidden disabled selected value> -- Choose a hall -- </option>")
        $("#hall-input")
          // Enable halls input
          .removeAttr("disabled")
          // Add options
          .empty()
          .append(content)
      })
  })
})



/* From add_movie.php */
function setFilename(elem) {
  if (elem.files.length == 0) return
  var fileName = elem.files[0].name;
  var nextSibling = elem.nextElementSibling

  nextSibling.innerText = fileName
}
$(document).ready(() => {
  $('.custom-file-input')
    .change(e => setFilename(e.target))
    .change()
});