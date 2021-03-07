@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
             Add Role
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="Post" action="">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input  type="text"  class="form-control"
                                                    placeholder="category" >
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text"  class="form-control"
                                                   placeholder="Description">
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox"  class="form-check-input" value="on" checked>
                                                Live
                                            </label>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">

                            <h3>All Role</h3>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title" style="width: 5%">SN</th>
                                    <th class="title" style="width: 20%">Name</th>
                                    <th class="title" style="width: 15%">Delay in Minute</th>
                                    <th class="title" style="width: 25%">Description</th>
                                    <th class="title" style="width: 20%">Added By</th>
                                    <th class="title" style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light btn-fill dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-offset="-185,-75">
                                                    <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                    <a class="dropdown-item edit-link" role="button" href="">Edit</a> |
                                                    <a class="dropdown-item delete-customer"href="">Delete</a>

                                                </div>
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@section('script')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>--}}
    {{--    <script src="{!! $baseURL.'resources/assets/js/custom/admin/dashboard.js'!!}"></script>--}}
@endsection
