<?php
$baseURL = getBaseURL();
?>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <ul class="sidebar-menu">
            <li class="header">Main Navigation</li>
        </ul>
        <div id="left_menu_to_scroll">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Home</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="list"></i> <span>Other List</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>All Service</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Sale</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Inventory</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Inventory Adjustment </span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Waste</span></a>
                </li>

                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Example</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Supplier Due Payment</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Customer Due Payment </span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Sand Sms</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Adjustment</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.role')}}">
                        <i data-feather="home"></i> <span>Roles</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.settings')}}">
                        <i data-feather="settings"></i> <span>Settings</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.restaurantList')}}">
                        <i data-feather="grid"></i> <span>Restaurant List</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.payment')}}">
                        <i data-feather="grid"></i> <span>Payment Methods</span></a>
                </li>
               
                <li class="treeview">
                    <a href="{{route('superAdmin.report')}}">
                        <i data-feather="shopping-cart"></i> <span>Report</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Register Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Daily Summaery Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Food Sale Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Daily Sale Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Detailed Sale Report</a>
                        </li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Consumption Report</a>
                        </li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Inventory Report</a>
                        </li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Low Inventory Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Profit Loss Report</a>
                        </li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Kitchen Performance Report</a>
                        </li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Attendance Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Supplier Ledger</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Supplier Due Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Customer Due Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Customer Ledger</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Purchase Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Expense Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Waste Report</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>
