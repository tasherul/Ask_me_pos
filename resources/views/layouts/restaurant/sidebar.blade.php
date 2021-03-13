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
                    <a href="{{route('restaurant.home')}}">
                        <i data-feather="home"></i> <span>Home</span></a>
                </li>

                <li>
                    <a href="{{route('restaurant.showSettings')}}">
                        <i data-feather="settings"></i> <span>Restaurant Settings</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i data-feather="shopping-bag"></i> <span>Purchase</span>
                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('suppliers.index')}}"><i class="fa fa-angle-double-right"></i>Suppliers</a>
                        </li>
                        <li><a href="{{route('ingredient-categories.index')}}"><i class="fa fa-angle-double-right"></i>Ingredient
                                Categories</a></li>
                        <li><a href="{{route('ingredient-units.index')}}"><i class="fa fa-angle-double-right"></i>Ingredient
                                Units</a></li>
                        <li><a href="{{route('ingredients.index')}}"><i class="fa fa-angle-double-right"></i>Ingredients</a>
                        </li>
                        <li><a href="{{route('purchases.index')}}"><i class="fa fa-angle-double-right"></i>Purchase</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('supplier_due')}}">
                        <i data-feather="credit-card"></i> <span>Supplier Due Payments</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i data-feather="trending-up"></i> <span>Sale</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('customer-groups.index')}}"><i class="fa fa-angle-double-right"></i>Customer Groups</a></li>
                        <li><a href="{{route('customers.index')}}"><i class="fa fa-angle-double-right"></i>Customers</a></li>
                        <li><a href="{{route('food-menu-shifts.index')}}"><i class="fa fa-angle-double-right"></i>Food Menu Shifts</a></li>
                        <li><a href="{{route('food-menu-categories.index')}}"><i class="fa fa-angle-double-right"></i>Food Menu Categories</a></li>
                        <li><a href="{{route('food-menu-categories.subcategory')}}"><i class="fa fa-angle-double-right"></i>Sub Categories</a></li>
                        <li><a href="{{route('food-menu-modifiers.index')}}"><i class="fa fa-angle-double-right"></i>Food Menu Modifiers</a>
                        </li>
                        <li><a href="{{route('kitchen-panels.index')}}"><i class="fa fa-angle-double-right"></i>Kitchen Panels</a>
                        </li>
                        <li><a href="{{route('food-menu.index')}}"><i class="fa fa-angle-double-right"></i>Food Menus</a>
                        </li>
                        <li><a href="{{route('floors.index')}}"><i class="fa fa-angle-double-right"></i>Floors</a></li>
                        <li><a href="{{route('sales.index')}}"><i class="fa fa-angle-double-right"></i>Sales</a>
                        </li>
                        <li><a href="{{route('pos.index')}}"><i class="fa fa-angle-double-right"></i>POS aka Add Sale</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i data-feather="briefcase"></i> <span>Staff</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('restaurant.staff')}}"><i class="fa fa-angle-double-right"></i>Add Staff</a></li>
                        <li><a href="{{route('all-staff-restaurant')}}"><i class="fa fa-angle-double-right"></i>All Staff</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i data-feather="tool"></i> <span>Roles</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('superAdmin.add_role')}}"><i class="fa fa-angle-double-right"></i>Group Role</a></li>
                        <li><a href="{{route('superAdmin.role')}}"><i class="fa fa-angle-double-right"></i>Role</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('panels.all')}}">
                        <i data-feather="coffee"></i> <span>Kitchen Panels</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('payment-method')}}">
                        <i data-feather="credit-card"></i> <span>Payment Methods</span></a>
                </li>
                <li>
                    <a href="{{route('inventory_adjustments')}}">
                        <i data-feather="edit"></i> <span>Inventory Adjustments</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('waiter-panel.index')}}">
                        <i data-feather="coffee"></i> <span>Waiter Panel</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i data-feather="dollar-sign"></i> <span>Expanse</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('expense-items.index')}}"><i class="fa fa-angle-double-right"></i>Expense Items</a></li>
                        <li><a href="{{route('expenses.index')}}"><i class="fa fa-angle-double-right"></i>Expenses</a></li>
                        <li><a href="{{route('expenses.add_expenses_category')}}"><i class="fa fa-angle-double-right"></i>Expenses Category</a></li>

                    </ul>
                </li>

                <li>
                    <a href="{{route('wastes.index')}}">
                        <i data-feather="trash-2"></i> <span>Waste</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('attendances.index')}}">
                        <i data-feather="clock"></i> <span>Attendance</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('stock.index')}}">
                        <i data-feather="server"></i> <span>Stock</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('stock-adjustment.index')}}">
                        <i data-feather="sun"></i> <span>Stock Adjustment</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('gift-card.index')}}">
                        <i data-feather="credit-card"></i> <span>Gift Card</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('restaurant.reservation')}}">
                        <i data-feather="book"></i> <span>Reservation</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="">
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
