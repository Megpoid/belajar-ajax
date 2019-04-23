$(document).ready(function () {

    //get base URL *********************
    var url = $('#url').val();


    //display modal form for creating new wali *********************
    $('#btn_add').click(function () {
        $('#btn-save').val("add");
        $('#frmWali').trigger("reset");
        $('#myModal').modal('show');
    });

    //create new product
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();
        var formData = {
            nama_wali: $('#nama_wali').val(),
        }

        //used to determine the http verb to use [add=POST]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var my_url = url;
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var wali_kelas = '<tr id="wali' + data.id + '"><td>' + data.id + '</td><td>' + data.nama_wali + '</td>';
                wali_kelas += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
                wali_kelas += ' <button class="btn btn-danger btn-delete delete-wali" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") { //untuk menambah data
                    $('#list_wali').append(wali_kelas);
                }
                $('#frmWali').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //delete product and remove it from TABLE list ***************************
    $(document).on('click', '.delete-wali', function () {
        var wali_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + wali_id,
            success: function (data) {
                console.log(data);
                $("#wali" + wali_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});