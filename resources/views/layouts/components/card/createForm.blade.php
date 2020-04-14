<!-- Modal -->
<div class="modal fade" id="cardFormModal" tabindex="-1" role="dialog" aria-labelledby="cardFormModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cardFormModalLabel">Card Form Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="cardForm" class="form-horizontal" enctype="multipart/form-data" data-state="add">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="file" class="form-control-file" id="avatar" name="avatar">
                        </div>
                    </div>

                    <br>
                    <button id="cardFormSubmit" class="btn btn-primary" data-id="">Save</button>
                </form>

            </div>
        </div>
    </div>
</div>