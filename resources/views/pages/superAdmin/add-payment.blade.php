@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
<div class="content-wrapper">
        <section class="content-header">
            <h1>
              Add Payment Methods
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form class="forms-sample">
                            @csrf
                            <div class="form-group">
                                <label>Payment Methods Name</label>
                                <input type="text" class="form-control" placeholder="Payment Methods Name">
                            </div>
                            <div class="form-group">
                                <label>Describe</label>
                                <input type="text" class="form-control"  placeholder="Enter Describe">
                            </div>
                            <div class="form-group">
                                <label> Added By</label>
                                <input type="text" class="form-control" placeholder="Added By">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked>
                                Checked
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
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
