@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-11 form-group">
                            <h1 style="text-align: center">Inventory</h1>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="" class="form-control">
                                    <option value="">Catagory</option>
                                    <option value=""></option>
                                </select>             
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="" class="form-control">
                                    <option value="">Interested</option>
                                    <option value=""></option>
                                </select>             
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="" class="form-control">
                                    <option value="">Food Manu</option>
                                    <option value="">#</option>
                                </select>             
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-info">Interested In Alert</button>
                        </div>
                        <div class="col-md-2">
                            <p style="text-align: right ">Stock Valu:$5000000</p>
                        </div>
                    </div>
                    
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center">SN</th>
                                    <th class="title text-center">Interested(Code)</th>
                                    <th class="title text-center">Catagory</th>
                                    <th class="title text-center">Stock Qty\ Amount</th>
                                    
                                </tr>
                                </thead>
                                
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/kitchenPanels.js'!!}"></script>
    
@endsection
