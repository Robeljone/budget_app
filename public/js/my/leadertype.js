$(document).ready(function () {
 var table = $('#example').DataTable({
  scrollX: true,
 });

 $("#addnew").on("submit", function (event) {
  event.preventDefault();
  $.ajax({
      type: "POST",
      url: "/add_lead_type",
      data: $('#addnew').serialize(),
      beforeSend: function () {
         $(".overl").removeClass("d-none");
      },
      success: function (data) {
          Swal.fire({
              title: data,
              icon: "success",
              confirmButtonText: "OK",
          }).then(
           function () {
             location.reload();
           }
         );
          $(".overl").addClass("d-none");
      },
      error: function (data) {
          Swal.fire({
              title: data.responseText,
              icon: "error",
              confirmButtonText: "OK",
          });
          $(".overl").addClass("d-none");
      },
  });
 });
});