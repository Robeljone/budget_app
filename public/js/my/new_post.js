$(document.body).on("click", ".addsocial", function () {
    $("#modname").text($(this).data("name"));
    $("#pid").val($(this).data("id"));
    $("#mymodal").modal({ backdrop: "static", keyboard: false });
    $("#mymodal").modal("show");
});

$(document).ready(function () {
    $(".mselct").select2();
    var table = $("#example").DataTable({
        scrollX: true,
    });
    const fileinput = document.getElementById('attach');
    fileinput.addEventListener("change",e=>{
        const  file = fileinput.files[0];
        const reader = new FileReader();
        for (let i=0;i<fileinput.files.length;i++)
        {
            const  file = fileinput.files[i];
            reader.addEventListener("load",()=>{
                console.log(reader.result);
                console.log("===========================");
            })
            reader.readAsDataURL(file);
        }
    })
    $("#addnew").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/post_new",
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
