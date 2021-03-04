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
        <section class="content-header">
            <h1>
                Supplier Details
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                    @foreach($purchases as $v_supplier)
                                    
                    @endforeach
                    @foreach($supplier as $s_supplier)
                                    
                    @endforeach

                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <h1>Refernce No</h1>
                                   
                                    <p>{{$v_supplier->reference_no}}</p>
                                </div>
                                <div class="col-md-2 form-group">
                                    <h1>Supplier</h1>
                                    <p>{{$s_supplier->name}}</p>
                                </div>
                                <div class="col-md-2 form-group">
                                    <h1>Date</h1>
                                    <p>{{$v_supplier->date}}</p>
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
                            <div class="row">
                                <div class="col-md-2 form-group">
                                </div>
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                
                            </div> 
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    {{-- <th class="title text-center">SN</th> --}}
                                    <th class="title text-center" style="width: 8%">SN</th>
                                    <th class="title text-center">Ingredients (Code)</th>
                                    <th class="title text-center">Unit  Price</th>
                                    <th class="title text-center">Quantity/Amount</th>
                                    <th class="title text-center">Total</th>
                                    <th class="title text-center">-</th>
                                    <th class="title text-center">-</th>
                                    <th class="title text-center">-</th>
                                </tr>
                                </thead>
                                <tbody class="purchase_body">
                                    @foreach($purchases as $v_supplier)
                                        <tr class="purchase_row">
                                            <td class="text-center">{{$v_supplier->id}}</td>
                                            <td class="text-center">{{$v_supplier->purchase_type}}</td>
                                            <td class="text-center">{{$v_supplier->	subtotal}}</td>
                                            <td class="text-center">{{$v_supplier->	paid}}</td>
                                            <td class="text-center"></td>
                                            <td class="text-center">
                                                <a role="button" class="btn btn-primary" href="">Accept</a> 
                                            </td>
                                            <td class="text-center">
                                                <a role="button" class="btn btn-primary" href="">Modify</a> 
                                            </td>
                                            <td class="text-center">
                                                <a role="button" class="btn btn-danger" href="">Cancel</a> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                            <div class="row">
                                <div class="col-md-10 form-group" style=" text-align:end">
                                    <h1>G.Total</h1>
                                    <p>${{$v_supplier->grand_total}}</p>
                                </div>
                               
                            </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                                
                                <div class="col-md-10 form-group" style=" text-align:end">
                                    <h1>Due</h1>
                                    <p>${{$v_supplier->due}}</p>
                                </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                                <div class="col-md-10 form-group" style=" text-align:end">
                                     <p>Sand To Accounts Payable</p>
                                </div>
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


    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/purchases.js'!!}"></script>

    
@endsection
