$(document).ready(function () {
    //When Click Add Card
    $('#cardModal').on('click', function (event) {
        $('#cardFormSubmit').data('id', ''); //Removing data-id, from selected edit-card
        $('#cardFormSubmit').data('state', 'add'); //Change Value Submit Button CardFrom To Add
        $('#cardFormModal').modal('show'); //Show Modal CardForm
    });
    //Reset Form When Clicked dismiss
    $('#cardFormModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset'); //Reset Input Value on CardForm
    });
    //When Card Table was Clicked
    $('#cardTable-refresh').on('click', function() {
        $('#cardTable-refresh').find('i').addClass('fa-spin');
        $('#card-table').DataTable().ajax.reload();
        $('#cardTable-refresh').find('i').removeClass('fa-spin');
    });
    $('#card-table').DataTable({ //Using Datatable to render ajax {{ route('card.list')}}
        "processing": true,
        "serverSide": true,
        "ajax": "/card/cardList",
        "columns": [{
                data: 'id',
                name: 'id',
                'visible': false
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'email',
                name: 'email',
            },
            {
                data: 'avatar',
                name: 'avatar', render:function(data, type, row){
                    return "<a href='/images/"+ row.avatar +"' target='_blank'>" + row.avatar + "</a>"
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    });
    //Edit
    $('body').on('click', '#edit-card', function () {
        var data_id = $(this).data('id'); //Get data-id on button Edit
        $.get('/card/edit/' + data_id, function (data) {
            $('#cardFormSubmit').data('id', data_id); //Set data-id on Submit Button CardFrom
            $('#cardForm').data('state', 'update'); //Change value on Submit Button CardForm To Update from Add
            $('#cardFormModal').modal('show'); //Show off Modal CardForm
            $('#name').val(data.name); //Set Value From Database to input Type where listed on that ID
            $('#email').val(data.email);
        })
    });
    //Store and Update
    $('#cardFormSubmit').on('click', function (event) {
        event.preventDefault();
        $.ajaxSetup({ //Set Token Session
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var cardTable = $('#card-table').dataTable();
        var cardForm = document.getElementById('cardForm');
        var state = $('#cardForm').data('state'); //State is Add or Update
        var cardUrl = '/card/store'; //Url When State was Add
        var cardMethod = 'POST';
        //when Update State
        if (state == 'update') {
            data_id = $(this).data('id'); //Get data-id on Submit Button CardForm
            cardUrl = '/card/update/' + data_id; //Url When State was Update
        }
        $('#cardFormSubmit').html('Sending  ').prop('disabled', true).append( 
            '<i class="fa fa-spinner fa-spin"></i>'); //Set Button to Disabled and Gave effect when spinning when Clicked
        $.ajax({
            url: cardUrl,
            method: cardMethod,
            data: new FormData(cardForm), //If on form was had input type:file, use this, if none use serialze() for smootly server
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#cardForm').trigger('reset'); //Reset Form when Success
                $('#cardFormModal').modal('hide'); //Hiding Modal
                $('#cardFormSubmit').html('Save').prop('disabled', false); //Remove Disabled and html Saving...
                $('#cardFormSubmit').find('i').remove(); //Remove i where has fa fa-spin
                $('#message').fadeIn().css('display', 'block').html(data.message)
                    .addClass(data.class_name); //Showing Message, classname
                cardTable.fnDraw(false);
            },
            error: function(err) {
                if(err.status === 422) {
                    console.log(err.responseJSON);
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        el.after($('<span style="color: red;">'+error[0]+'</span>'));
                    });
                }
                $('#cardFormSubmit').html('Save').prop('disabled', false);
                $('#cardFormSubmit').find('i').remove();
            }
        });
    });
    //Delete
    $('body').on('click', '#delete-card', function () {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data_id = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                url: '/card/delete/' + data_id,
                type: 'GET',
                success: function(data) {
                    swal("Done!", "It was succesfully deleted!", "success");
                    $('#message').css('display', 'block');
                    $('#message').html(data.message);
                    $('#message').addClass(data.class_name);
                    var oTable = $('#card-table').dataTable();
                    oTable.fnDraw(false);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal("Error deleting!", "Please try again", "error");
                }
            });
        });
    });
});