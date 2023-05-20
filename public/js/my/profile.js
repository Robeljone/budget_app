$("#addnew").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "/add_profile_social",
        data: $('#addnew').serialize(),
        beforeSend: function () {
          $("#over1").removeClass("d-none");
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
            $("#over1").addClass("d-none");
        },
        error: function (data) {
            Swal.fire({
                title: data.responseText,
                icon: "error",
                confirmButtonText: "OK",
            });
            $("#over1").addClass("d-none");
        },
    });
});
$( ".editmid" ).on( "click", function() {
    $("#psmid").val($(this).attr("data-id"));
    $('#stype').val($(this).attr("data-tid"));
    $("#slink").val($(this).attr("data-link"));
} );

$("#updatemid").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "/up_profile_social",
        data: $('#updatemid').serialize(),
        beforeSend: function () {
          $("#over2").removeClass("d-none");
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
            $("#over2").addClass("d-none");
        },
        error: function (data) {
            Swal.fire({
                title: data.responseText,
                icon: "error",
                confirmButtonText: "OK",
            });
            $("#over2").addClass("d-none");
        },
    });
});