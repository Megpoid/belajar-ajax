@extends('layouts.master')

@section('title')
<title>Dashboard Wali</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New Product</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr class="info">
                            <th>ID </th>
                            <th>Nama Wali</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="list_wali" name="list_wali">
                        @foreach ($wali_kelas as $wali)
                        
                        <tr id="wali{{$wali->id}}" class="active">
                            <td>{{$wali->id}}</td>
                            <td>{{$wali->nama_wali}}</td>
                            <td width="35%">
                                <button class="btn btn-warning btn-detail open_modal"
                                    value="{{$wali->id}}">Edit</button>
                                <button class="btn btn-danger btn-delete delete-wali"
                                    value="{{$wali->id}}">Delete</button>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Passing BASE URL to AJAX -->
    <input id="url" type="hidden" value="{{ \Request::url() }}">

    <!-- MODAL SECTION -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Wali Form</h4>
                </div>
                <div class="modal-body">
                    
                    <form id="frmWali" name="frmWali" class="form-horizontal" novalidate="">
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label">Nama Wali</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="nama_wali" name="nama_wali"
                                    placeholder="Nama Wali" value="">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Save Changes</button>
                    <input type="hidden" id="wali_id" name="wali_id" value="0">
                </div>
            </div>
        </div>
    </div>
@endsection
