$(document).ready(function () {
    var table = $("#example").DataTable({
        scrollX: true,
        columns: [
            { width: "2%" },
            { width: "15%" },
            { width: "50%" },
            { width: "10%" },
        ],
    });
    $("#addsocialmid").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/add_lead_social",
            data: $("#addsocialmid").serialize(),
            beforeSend: function () {
                $(".overl").removeClass("d-none");
            },
            success: function (data) {
                Swal.fire({
                    title: data,
                    icon: "success",
                    confirmButtonText: "OK",
                }).then(function () {
                  location.reload();
                });
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
