$(document.body).on("click", ".addsocial", function () {
    $("#modname").text($(this).data("name"));
    $("#pid").val($(this).data("id"));
    $("#mymodal").modal({ backdrop: "static", keyboard: false });
    $("#mymodal").modal("show");
});

$(document).ready(function () {
    $("#editForm").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/organization_edit",
            data: $("#addnew").serialize(),
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
