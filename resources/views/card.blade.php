@extends('layouts.master')

@section('css')
<link href="{{ asset('layouts/master/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="alert" id="message" style="display: none"></div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="javascript:void(0)" class="btn btn-primary" data-togel="modal" id="cardModal">Add Card</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="javascript:void(0)" id="cardTable-refresh" class="m-0 font-weight-bold text-primary"> Card Table <i class="fas fa-sync-alt"></i> </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="card-table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Avatar</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@include('layouts.components.card.createForm')
@endsection
@section('js')
<script src="{{ asset('js/card.js') }}"></script>
<script src="{{ asset('layouts/master/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('layouts/master/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endsection