@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
            <section class="content-header">
                <h1>
                Role
                </h1>
            </section>
            <section class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Manager</label>
                            </div>
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Boss</label>
                            </div>
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Server</label>
                            </div>
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Cashier</label>
                            </div>
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Driver</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"> 
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Assistant Manager</label>
                            </div>
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Kitchen Staff</label>
                            </div>
                            <div class="col-md-2">
                                <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Training</label>
                            </div>
                            <div class="col-md-2">
                                <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Supervisor</label>
                            </div>
                            </div>
                    </div>
                </div>
            </section>

            <section class="content-header">
                <h1>
                 Permissions
                </h1>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                            <a role="button" href="#" class="btn btn-primary" id="add_edit_cuisine">Ordering Food</a>
                            <a role="button" href="#" class="btn btn-primary" id="add_edit_cuisine">Edit Oder</a>
                            <a role="button" href="#" class="btn btn-primary" id="add_edit_cuisine">Payment</a>
                            <a role="button" href="#" class="btn btn-primary" id="add_edit_cuisine">Operation</a>
                            <a role="button" href="#" class="btn btn-primary" id="add_edit_cuisine">Admin</a>
                            <a role="button" href="#" class="btn btn-primary" id="add_edit_cuisine">Report</a>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-1">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Dine in</label>
                            </div>
                            <div class="col-md-1">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>To Go</label>
                            </div>
                            <div class="col-md-1">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Pickup</label>
                            </div>
                            <div class="col-md-1">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Delivery</label>
                            </div>
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Open Food</label>
                            </div>
                            <div class="col-md-1">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Note</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Moble Order</label>
                            </div>
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Multi Order</label>
                            </div>
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Open Table</label>
                            </div>
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Modify In Kitcjen Item Option</label>
                            </div>
                            <div class="col-md-2">
                            <label><input type="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Ressend In Kitchen Item</label>
                            </div>
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
