$(document).ready(function() {
    $('.mselct').select2();
    var table = $('#example').DataTable({
        scrollX: true,
    });
    $("#addnew").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/add_social_media",
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
    $("#filter").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/lead_filter",
            data: $('#filter').serialize(),
            beforeSend: function () {
                $(".overl").removeClass("d-none");
            },
            success: function (data) {
                if(data.length == 0){
                    Swal.fire({
                        title: "NO data Found With given Parameter",
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                }else{
                    Swal.fire({
                        title: "Data Retrived",
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                    $('#example').DataTable().clear();
                    var row = 1;
                    $.each(data, function (index, value) {
                        $('#example').dataTable().fnAddData( [
                            row,
                            value.ownName.concat(" ", value.fatherName, " ", value.gFatherName),
                            value.title,
                            '<div class="btn-group"><button type="button" class="btn btn-info">Action</button><button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown"><span class="sr-only">Toggle Dropdown</span></button>                <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Delete</a><a class="dropdown-item" href="/leader_social_mideas/'+value.id+'">Social Media</a></div></div>'
                        ]);

                        row++;
                    });
                }
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
