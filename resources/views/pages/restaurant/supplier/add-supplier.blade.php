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
                    <div class="box-body table-responsive">
                        <h3>Add Supplier Due Payments</h3>
                    </div>
                </div>
            </div>
            <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select Supplier <span class="required_star">*</span></label>
                                        <select name="" class="form-control">
                                            <option value="">Select Supplier</option>
                                            @foreach($all_data as $V_all)
                                                <option value="{{$V_all->id}}">{{$V_all->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment <span class="required_star">*</span></label>
                                        <select name="" class="form-control">
                                            <option value="">Select Payment</option>
                                            <option value="">Name</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label>Amount <span class="required_star">*</span></label>
                                            <input type="text"  class="form-control"
                                                   placeholder="" value="">
                                    </div>
                                    <div class="form-group">
                                            <label>Payment </label>
                                            <input type="text"  class="form-control" placeholder="" value="">
                                    </div>

                                    <div class="form-group">
                                            <label>Note </label>
                                            <input type="text"  class="form-control" placeholder="" value="">
                                    </div>
                                    <div class="form-group">
                                    <button type="submit"  class="btn btn-primary">Submit</button>
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


    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/foodMenuCategories.js'!!}"></script>
@endsection
