/* Utilities functions from browse_time_slots.php */
newTag = (t, s) => `<${t}> ${s} </${t}>`
newRow = s => newTag("tr", s)
newCell = s => newTag("td", s)
// newRow = s => `<tr> ${s} </tr>`
// newCell = s => `<td> ${s} </td>`
header = ["ID", "Branch Name", "Hall letter", "Date", "Time"];

$(document).ready(() => {
  $("[data-ajax='fetch-time-slots']")
    .change(fetchTimeSlotsHandler)
  $("[data-ajax='fetch-halls']")
    .change(fetchHallsHandler)

  $('.custom-file-input')
    .change(e => setFilename(e.target))
    .change()
})

/**
 * Used in browse_time_slots.php to fetch time slots info and output them in a table
 *
 * Assumes the existance of an empty container #ts-table for the output
 */
function fetchTimeSlotsHandler(e) {
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
}

/**
 * Used in add_time_slots.php to fetch halls and place them as options in #hall-input
 */
function fetchHallsHandler(e) {
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
}


// Used for .custom-file-input
function setFilename(elem) {
  if (elem.files.length == 0) return
  var fileName = elem.files[0].name;
  var nextSibling = elem.nextElementSibling

  nextSibling.innerText = fileName
}