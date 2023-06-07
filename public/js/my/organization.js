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
    $('#social_media_id').on('change', function() {
        $.ajax({
            type: "GET",
            url: "/get_social_media_property/"+this.value,
            data: this.value,
            success: function (data) {
                var response_property = data;

                if (data.length>0)
                {
                    $('#property').children().remove();
                    for (let i=0;i<data.length;i++)
                    {
                        $('#property').append('<div class="col-lg-3" id="list_col"><div class="form-group"><label>'+data[i]["property_name"]+'</label><input type="text" class="form-control form-control-sm" placeholder='+data[i]['property_name']+'  required="required" name='+data[i]['property_name']+' /></div></div>')
                    }

                }
                else{
                    $('#property').children().remove();
                }
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
    $("#addnew").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/organization_new",
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
    $("#filter").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/lead_filter",
            data: $("#filter").serialize(),
            beforeSend: function () {
                $(".overl").removeClass("d-none");
            },
            success: function (data) {
                if (data.length == 0) {
                    Swal.fire({
                        title: "NO data Found With given Parameter",
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                } else {
                    Swal.fire({
                        title: "Data Retrived",
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                    $("#example").DataTable().clear();
                    var row = 1;
                    $.each(data, function (index, value) {
                        $("#example")
                            .dataTable()
                            .fnAddData([
                                row,
                                value.ownName.concat(
                                    " ",
                                    value.fatherName,
                                    " ",
                                    value.gFatherName
                                ),
                                value.title,
                                '<div class="btn-group"><button type="button" class="btn btn-info">Action</button><button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown"><span class="sr-only">Toggle Dropdown</span></button>                <div class="dropdown-menu" role="menu"><a class="dropdown-item">Delete</a><button class="dropdown-item addsocial" data-id="' +
                                value.id +
                                '" data-name="' +
                                value.ownName +
                                " " +
                                value.fatherName +
                                " " +
                                value.gFatherName +
                                '">Add Social Midea</button><a class="dropdown-item" href="/leader_social_mideas/' +
                                value.id +
                                '">Social Media</a></div></div>',
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
    $("#addsocialmid").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/organization_new",
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
                    $("#addsocialmid").trigger("reset");
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
