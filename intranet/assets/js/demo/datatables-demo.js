// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
    language: {
      url: "assets/vendor/datatables/Spanish.json",
    },
  });
});
