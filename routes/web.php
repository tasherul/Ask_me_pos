<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['XSS']], function () {
    //for sms test purpose
    Route::get('/sms', 'SmsController@sendSms')->name('sms');

    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/browse-restaurant', 'IndexController@browseRestaurant')->name('browseRestaurant');
    Route::get('/featured-restaurant-by-ajax', 'IndexController@featuredRestaurantByAjax')->name('featuredRestaurantByAjax');
    Route::get('/restaurant-by-ajax', 'IndexController@restaurantByAjax')->name('restaurantByAjax');
    Route::get('/show-restaurant/{slug}', 'IndexController@restaurant')->name('restaurant.single');
    Route::get('/show-floor-with-tables-ajax', 'IndexController@getFloorWithTable');


    Route::get('/get-food-meny-by-ajax', 'IndexController@getFoodMenuByAjax')->name('getFoodMenuByAjax');


    Route::get('/cuisine', 'IndexController@restaurantByCuisine')->name('restaurantByCuisine');
    Route::get('/cuisine-restaurant-by-ajax', 'IndexController@cuisineRestaurantByAjax')->name('cuisineRestaurantByAjax');

    //Delivery option
    Route::post('/set-delivery-option-by-ajax', 'IndexController@deliveryOption')->name('deliveryOption');


    //cart
    Route::post('/add-to-cart-by-ajax', 'OnlineCartController@addToCartByAjax')->name('addToCartByAjax');
    Route::post('/edit-to-cart-by-ajax', 'OnlineCartController@editToCartByAjax')->name('editToCartByAjax');
    Route::post('/delete-from-cart-by-ajax', 'OnlineCartController@deleteFromCartByAjax')->name('deleteFromCartByAjax');





    Route::group(['prefix' => 'SuperAdmin'], function () {
        Route::get('/payment','SuperAdminPaymentController@payment')->name('superAdmin.payment');
        Route::get('/addpayment','SuperAdminPaymentController@addPayment')->name('superAdmin.addPayment');

        Route::get('/report','SuperAdminPaymentController@report')->name('superAdmin.report');

        //ROLE Controller//
        Route::get('/role','SuperAdminRoleController@role')->name('superAdmin.role');


        Route::get('/subcreate','SuperAdminRoleController@addrole')->name('superAdmin.add_role');
        Route::post('/subcreate','SuperAdminRoleController@role_insert')->name('superAdmin.role-insert');
        Route::get('/Edit-Role/{id}','SuperAdminRoleController@edit_role')->name('Edit-Role');
        Route::get('/Delete-Role/{id}','SuperAdminRoleController@delete_role')->name('Delete-Role');
        Route::post('/update-role', 'SuperAdminRoleController@csvadd')->name('update-role');



        Route::get('/SALogin', 'SuperAdminAuthController@showLoginForm')->name('superAdmin.showLoginForm');
        Route::post('/SALogin', 'SuperAdminAuthController@doLogin')->name('superAdmin.doLogin');

        Route::get('/logout', 'SuperAdminAuthController@logout')->name('superAdmin.logout');

        Route::get('/dashboard', 'SuperAdminDashboardController@dashboard')->name('superAdmin.dashboard');

        Route::group(['prefix' => 'settings'], function () {

            Route::get('', 'SuperAdminSettingsController@index')->name('superAdmin.settings');

            Route::resource('countries', 'CountriesController');
            Route::get('countries/{id}/delete', 'CountriesController@delete')->name('countries.delete');
            Route::post('countries-csv', 'CountriesController@csvadd')->name('countries.csv');


            Route::resource('states', 'StatesController');
            Route::get('states/{id}/delete', 'StatesController@delete')->name('states.delete');

            Route::resource('cities', 'CitiesController');
            Route::get('cities/{id}/delete', 'CitiesController@delete')->name('cities.delete');

            Route::resource('cuisines', 'CuisinesController');
            Route::get('cuisines/{id}/delete', 'CuisinesController@delete')->name('cuisines.delete');

            Route::get('privacy-policy', 'PrivacyPoliciesController@show')->name('privacyPolicies.show');
            Route::put('privacy-policy/{id}', 'PrivacyPoliciesController@update')->name('privacyPolicies.update');

            Route::resource('social-media', 'SocialMediaController');
            Route::get('social-media/{id}/delete', 'SocialMediaController@delete')->name('social-media.delete');

            Route::resource('third-party-vendors', 'ThirdPartyVendorsController');
            Route::get('third-party-vendors/{id}/delete', 'ThirdPartyVendorsController@delete')->name('third-party-vendors.delete');

            Route::resource('charges', 'ChargesController');
            Route::get('charges/{id}/delete', 'ChargesController@delete')->name('charges.delete');



        });

        Route::get('/restaurant-list', 'SuperAdminRestaurantsController@restaurantList')->name('superAdmin.restaurantList');
        Route::get('/restaurant-list/{id}', 'SuperAdminRestaurantsController@viewDetail')->name('superAdmin.restaurantList.viewDetail');
        Route::get('/restaurant-list/{id}/approve', 'SuperAdminRestaurantsController@approve')->name('superAdmin.restaurantList.approve');
        Route::get('/restaurant-list/{id}/disapprove', 'SuperAdminRestaurantsController@disapprove')->name('superAdmin.restaurantList.disapprove');

        Route::get('/restaurant-list/{id}/featured', 'SuperAdminRestaurantsController@featured')->name('superAdmin.restaurantList.featured');
        Route::get('/restaurant-list/{id}/non-featured', 'SuperAdminRestaurantsController@nonFeatured')->name('superAdmin.restaurantList.nonFeatured');

        Route::get('/restaurant-list/{id}/delete', 'SuperAdminRestaurantsController@delete')->name('superAdmin.restaurantList.delete');

        Route::post('/add-restaurant-charge-by-ajax', 'SuperAdminRestaurantsController@addRestaurantChargeByAjax')->name('superAdmin.addRestaurantChargeByAjax');

        Route::post('/edit-restaurant-charge-by-ajax', 'SuperAdminRestaurantsController@editRestaurantChargeByAjax')->name('superAdmin.editRestaurantChargeByAjax');


    });

    Route::group(['prefix' => 'restaurant'], function () {
        Route::get('/sign-up', 'RestaurantAuthController@showSignUpForm')->name('restaurant.showSignUpForm');
        Route::post('/sign-up', 'RestaurantAuthController@doSignUp')->name('restaurant.doSignUp');

        Route::get('/verify/{token}', 'RestaurantVerifyController@restaurantVerifyEmail')->name('restaurant.verifyEmail');

        Route::get('/login', 'RestaurantAuthController@showLoginForm')->name('restaurant.showLoginForm');
        Route::post('/login', 'RestaurantAuthController@doLogin')->name('restaurant.doLogin');

        Route::get('/logout', 'RestaurantAuthController@logout')->name('restaurant.logout');

        Route::get('/home', 'RestaurantHomeController@home')->name('restaurant.home');

        Route::group(['prefix' => 'settings'], function () {
            Route::get('', 'RestaurantSettingsController@showSettings')->name('restaurant.showSettings');
            Route::post('', 'RestaurantSettingsController@updateSettings')->name('restaurant.updateSettings');
            Route::post('add-third-party-vendors', 'RestaurantSettingsController@addThirdPartyVendor')->name('restaurant.addThirdPartyVendor');
            Route::post('change-third-party-vendor-availability-by-ajax', 'RestaurantSettingsController@changeThirdPartyVendorAvailabilityByAjax')->name('restaurant.changeThirdPartyVendorAvailabilityByAjax');

            Route::post('add-cuisines', 'RestaurantSettingsController@addCuisine')->name('restaurant.addCuisine');

        });

        Route::group(['prefix' => 'purchase'], function () {
            Route::resource('suppliers', 'RestaurantSuppliersController');
            Route::get('/suppliers/{id}/delete', 'RestaurantSuppliersController@delete')->name('suppliers.delete');
            Route::post('/suppliers/send-text-mail', 'RestaurantSuppliersController@sendTextMail');


            Route::get('/supplier_details/{id}','RestaurantSuppliersController@detailsAll')->name('supplier_details');




            Route::resource('ingredient-categories', 'RestaurantIngredientCategoriesController');
            Route::get('/ingredient-categories/{id}/delete', 'RestaurantIngredientCategoriesController@delete')->name('ingredient-categories.delete');

            Route::resource('ingredient-units', 'RestaurantIngredientUnitsController');
            Route::get('/ingredient-units/{id}/delete', 'RestaurantIngredientUnitsController@delete')->name('ingredient-units.delete');

            Route::get('/ingredients/upload', 'RestaurantIngredientsController@upload')->name('ingredients.upload');
            Route::post('/ingredients/upload', 'RestaurantIngredientsController@import')->name('ingredients.import');
            Route::get('/ingredients/download-sample-file', 'RestaurantIngredientsController@downloadSampleFile')->name('ingredients.downloadSampleFile');
            Route::resource('ingredients', 'RestaurantIngredientsController');
            Route::get('/ingredients/{id}/delete', 'RestaurantIngredientsController@delete')->name('ingredients.delete');

            Route::resource('purchases', 'RestaurantPurchasesController');
            Route::get('/purchases/{id}/delete', 'RestaurantPurchasesController@delete')->name('purchases.delete');
            Route::post('/purchases/supplier/create', 'RestaurantPurchasesController@createSupplier');
            Route::get('/purchases_details/{id}','RestaurantPurchasesController@detailsAll')->name('purchases_details');
            Route::get('/purchases_single/{id}', 'RestaurantPurchasesController@deletepurchases')->name('purchases_single.delete');
            Route::get('/purchases_modify/{id}','RestaurantPurchasesController@purchasesmodifys')->name('purchases_modify');
            Route::post('/modify_update','RestaurantPurchasesController@updatemodifys')->name('update.modify_update');


        });

        Route::group(['prefix' => 'sale'], function () {

            Route::resource('customer-groups', 'RestaurantCustomerGroupController');
            Route::get('/customer-groups/{id}/delete', 'RestaurantCustomerGroupController@delete')->name('customer-groups.delete');

            Route::resource('customers', 'RestaurantCustomersController');
            Route::get('/customers/{id}/delete', 'RestaurantCustomersController@delete')->name('customers.delete');

            Route::post('/add_customer_by_ajax', 'RestaurantCustomersController@addCustomerByAjax');
            Route::get('/get_all_customers_for_this_user', 'RestaurantCustomersController@getAllCustomerByAjax');
            Route::post('/get_customer_ajax', 'RestaurantCustomersController@getCustomerByAjax');

            Route::post('/customers/send-text-mail', 'RestaurantCustomersController@sendTextMail');

            Route::resource('food-menu-shifts', 'RestaurantFoodMenuShiftsController');
            Route::get('/food-menu-shifts/{id}/delete', 'RestaurantFoodMenuShiftsController@delete')->name('food-menu-shifts.delete');

            Route::resource('food-menu-categories', 'RestaurantFoodMenuCategoriesController');
            Route::get('/food-menu-categories/{id}/delete', 'RestaurantFoodMenuCategoriesController@delete')->name('food-menu-categories.delete');

            Route::get('/subcategory','RestaurantFoodMenuCategoriesController@subcategorys')->name('food-menu-categories.subcategory');
            Route::get('/subcreate','RestaurantFoodMenuCategoriesController@subcreate')->name('food-menu-categories.subcreate');
            Route::get('/Add-Category/{id}','RestaurantFoodMenuCategoriesController@add_category')->name('Add-Category');
            Route::get('/Delete-Sub-Category/{id}','RestaurantFoodMenuCategoriesController@delete_sub_catagory')->name('Delete-Sub-Category');
            Route::get('/Delete-Category/{id}','RestaurantFoodMenuCategoriesController@delete_catagory')->name('Delete-Category');
            Route::get('/Edit-Category/{id}','RestaurantFoodMenuCategoriesController@edit_catagory')->name('Edit-Category');
            Route::post('/subcatagory_insert','RestaurantFoodMenuCategoriesController@subcatagory_insert')->name('subcatagory_insert');
            Route::post('/Catagory_Edit','RestaurantFoodMenuCategoriesController@subcatagory_edit')->name('Catagory_Edit');

            Route::get('/supplier_due','RestaurantFoodMenuCategoriesController@supplier_dues')->name('supplier_due');
            Route::get('/add_supplier_due','RestaurantFoodMenuCategoriesController@add_supplier_dues')->name('add_supplier_due');

            Route::post('/food-menu-SubCatagory.insert', 'RestaurantFoodMenuCategoriesController@save_subcatagory')->name('food-menu-SubCatagory.insert');



            Route::resource('food-menu-modifiers', 'RestaurantFoodMenuModifiersController');
            Route::get('/food-menu-modifiers/{id}/delete', 'RestaurantFoodMenuModifiersController@delete')->name('food-menu-modifiers.delete');

            Route::resource('kitchen-panels', 'RestaurantKitchenPanelsController');
            Route::get('/kitchen-panels/{id}/delete', 'RestaurantKitchenPanelsController@delete')->name('kitchen-panels.delete');

            Route::resource('food-menu', 'RestaurantFoodMenuController');
            Route::get('/food-menu/{id}/assign-modifier', 'RestaurantFoodMenuController@assignModifier')->name('food-menu.assign-modifier');
            Route::put('/food-menu/{id}/assign-modifier', 'RestaurantFoodMenuController@updateAssignModifier')->name('food-menu.update-assign-modifier');
            Route::get('/food-menu/{id}/delete', 'RestaurantFoodMenuController@delete')->name('food-menu.delete');

            Route::resource('floors', 'RestaurantFloorController');
            Route::get('/floors/{id}/delete', 'RestaurantFloorController@delete')->name('floors.delete');

            Route::resource('floor-tables', 'RestaurantFloorTableController', ['except' => 'create']);
            Route::get('/floor-tables/{floorId}/create', 'RestaurantFloorTableController@create')->name('floor-tables.create');
            Route::get('/floor-tables/{id}/delete', 'RestaurantFloorTableController@delete')->name('floor-tables.delete');

            // Route::put('floor-tables/table-position', [
            //     'as' => 'table.position',
            //     'uses' => 'RestaurantFloorTableController@tablePosition'
            // ]);

            Route::resource('sales', 'RestaurantSaleController');
            // Route::post('/sales/filter', 'RestaurantSaleController@filter')->name('sales.filter');

            Route::get('/sales/{id}/delete', 'RestaurantSaleController@delete')->name('sales.delete');
            Route::post('/add_sale_by_ajax', 'RestaurantSaleController@addSaleByAjax');

            Route::post('/update_order_status_ajax', 'RestaurantSaleController@updateOrderStatusByAjax');

            Route::get('/get_new_orders_ajax', 'RestaurantSaleController@getNewOrdersByAjax');
            Route::post('/get_all_information_of_a_sale_ajax', 'RestaurantSaleController@getInformationOfSaleByAjax');

            Route::post('/cancel_particular_order_ajax', 'RestaurantSaleController@deleteSingleOrderByAjax');

            Route::get('/get_new_hold_number_ajax', 'RestaurantSaleController@getNewHoldNumberByAjax');
            Route::post('/add_hold_by_ajax', 'RestaurantSaleController@addHoldByAjax');
            Route::get('/get_all_holds_ajax', 'RestaurantSaleController@getAllHoldsByAjax');
            Route::post('/get_single_hold_info_by_ajax', 'RestaurantSaleController@getSingleHoldInfoByAjax');
            Route::post('/delete_all_information_of_hold_by_ajax', 'RestaurantSaleController@deleteSingleHoldInfoByAjax');
            Route::post('/delete_all_holds_with_information_by_ajax', 'RestaurantSaleController@deleteAllHoldByAjax');

            //online order
            Route::get('/get_all_online_order_ajax', 'RestaurantSaleController@getAllOnlineOrdersByAjax');
            Route::post('/get_single_online_order_info_by_ajax', 'RestaurantSaleController@getSingleOnlineOrderInfoByAjax');
            Route::post('/add_online_order_to_sale_by_ajax', 'RestaurantSaleController@addOnlineOrderToSaleByAjax');

            //Route::post('/delete_all_information_of_online_order_by_ajax', 'RestaurantSaleController@deleteSingleOnlineOrderInfoByAjax');
            //Route::post('/delete_all_online_orders_with_information_by_ajax', 'RestaurantSaleController@deleteAllOnlineOrderByAjax');



            Route::get('/print_bill/{id}', 'RestaurantSaleController@printBill');
            Route::get('/print_invoice/{id}', 'RestaurantSaleController@printInvoice');


            Route::resource('pos', 'RestaurantPosController');
            Route::get('/food-menus-change-for-shift-ajax', 'RestaurantPosController@changeFoodMenus');
            Route::get('/get_floor_with_tables_ajax', 'RestaurantPosController@getFloorWithTable');
            Route::get('/get_all_tables_with_new_status_ajax', 'RestaurantPosController@getAllTablesWithNewStatus');

            Route::post('/get_new_notifications_ajax', 'RestaurantPosController@getNewNotificationByAjax');

            Route::post('/remove_notication_ajax', 'RestaurantPosController@removeNotificationByAjax');
            Route::post('/remove_multiple_notification_ajax', 'RestaurantPosController@removeMultipleNotificationByAjax');
            Route::get('/show_catagory_ajax/{id}', 'RestaurantPosController@show_catagory_ajax');
            //Route::get('/show_food_menu_ajax/{id}', 'RestaurantPosController@show_food_menu_ajax');


        });

        Route::group(['prefix' => 'kitchen'], function () {
            Route::get('/all-panels', 'RestaurantKitchenPanelsController@allPanels')->name('panels.all');
            Route::get('/panels/{id}', 'RestaurantKitchenPanelsController@singlePanel')->name('panels.singlePanel');

            Route::post('/get_new_orders_ajax', 'RestaurantKitchenPanelsController@getNewOrdersAjax');
            Route::post('/update_cooking_status_ajax', 'RestaurantKitchenPanelsController@updateCookingStatusAjax');
            Route::post('/update_cooking_status_delivery_take_away_ajax', 'RestaurantKitchenPanelsController@updateCookingStatusDeliveryTakeAwayAjax');
            Route::post('/get_new_notifications_ajax', 'RestaurantKitchenPanelsController@getNewNotificationByAjax');
            Route::post('/remove_notication_ajax', 'RestaurantKitchenPanelsController@removeNotificationByAjax');
            Route::post('/remove_multiple_notification_ajax', 'RestaurantKitchenPanelsController@removeMultipleNotificationByAjax');

            Route::get('/inventory_adjustments', 'RestaurantKitchenPanelsController@inventoryadjustments')->name('inventory_adjustments');
            Route::get('/add_inventoryadjustment', 'RestaurantKitchenPanelsController@add_inventoryadjustments')->name('add_inventoryadjustment');

        });

        Route::group(['prefix' => 'waiter'], function () {
            Route::resource('waiter-panel', 'RestaurantWaiterPanelsController');
        });

        Route::group(['prefix' => 'expense'], function () {
            Route::resource('expense-items', 'RestaurantExpenseItemsController');
            Route::get('/expense-items/{id}/delete', 'RestaurantExpenseItemsController@delete')->name('expense-items.delete');

            Route::resource('expenses', 'RestaurantExpensesController');
            Route::get('/expenses/{id}/delete', 'RestaurantExpensesController@delete')->name('expenses.delete');
            Route::get('/filter', 'RestaurantExpensesController@filter')->name('expenses.filter');

            //// All Expense Category////
            Route::get('/add_expenses_category', 'RestaurantExpensesController@addExpensesCategorys')->name('expenses.add_expenses_category');
            Route::post('/expenses_add_category', 'RestaurantExpensesController@expensesAddCategorys')->name('expenses.expenses_add_category');
            Route::get('/Delete-Expence/{id}','RestaurantExpensesController@delete_expensesCategorys')->name('Delete-Expence');
            Route::get('/Edit-Expence/{id}','RestaurantExpensesController@edit_expensesCategorys')->name('Edit-Expence');



        });

        Route::group(['prefix' => 'waste'], function () {
            Route::resource('wastes', 'RestaurantWastesController');
            Route::get('/wastes/{id}/delete', 'RestaurantWastesController@delete')->name('wastes.delete');
            Route::get('/food_menus_ingredients_by_ajax', 'RestaurantWastesController@getFoodMenusIngredientsByAjax');
        });

        Route::group(['prefix' => ''], function () {
            Route::resource('attendances', 'RestaurantAttendancesController');
            Route::get('/attendances/{id}/delete', 'RestaurantAttendancesController@delete')->name('attendances.delete');
            Route::get('/filter', 'RestaurantAttendancesController@filter')->name('attendances.filter');

        });

        //Stock
        Route::group(['prefix' => 'stock'], function () {
            Route::resource('stock', 'RestaurantStockController');
            Route::get('/stock-alertlist', 'RestaurantStockController@getStockAlertList')->name('stock-alertlist');
        });


        //Stock Adjustment
        Route::resource('stock-adjustment', 'RestaurantStockAdjustmentsController');
        Route::get('/stock-adjustment/{id}/delete', 'RestaurantStockAdjustmentsController@delete')->name('stock-adjustment.delete');

        //Stock Adjustment
        Route::resource('gift-card', 'RestaurantGiftCardController');
        Route::get('/gift-card/{id}/delete', 'RestaurantGiftCardController@delete')->name('gift-card.delete');
        Route::get('/gift-card-sell', 'RestaurantGiftCardController@giftCardSell')->name('gift-card.sell');
        Route::post('/gift-card-sell', 'RestaurantGiftCardController@giftCardSellStore')->name('gift-card.sell-store');
        Route::get('/gift-card-check-by-ajax', 'RestaurantGiftCardController@giftCardCheckByAjax')->name('gift-card.giftCardCheckByAjax');

        Route::get('/reservation', 'RestaurantReservationController@reservation')->name('restaurant.reservation');
        Route::post('/reservation/send-text-mail', 'RestaurantReservationController@sendTextMail');


    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('/sign-up', 'CustomerAuthController@showSignUpForm')->name('customer.showSignUpForm');
        Route::post('/sign-up', 'CustomerAuthController@doSignUp')->name('customer.doSignUp');

        Route::get('/verify/{token}', 'CustomerAuthController@customerVerifyEmail')->name('customer.verifyEmail');

        Route::get('/login', 'CustomerAuthController@showSignUpForm')->name('customer.showLoginForm');
        Route::post('/login', 'CustomerAuthController@doLogin')->name('customer.doLogin');

        Route::post('/login-by-ajax', 'CustomerAuthController@doLoginByAjax')->name('customer.doLoginByAjax');

        Route::get('/logout', 'CustomerAuthController@logout')->name('customer.logout');

        Route::get('/profile', 'CustomerController@profile')->name('customer.profile');
        Route::post('/profile-picture', 'CustomerController@profilePicture')->name('customer.profilePicture');
        Route::post('/update-profile', 'CustomerController@updateProfile')->name('customer.updateProfile');


        Route::get('/get-address-details-by-ajax', 'CustomerAddressController@detailOfAddress')->name('customer.detailOfAddress');
        Route::post('/store-address', 'CustomerAddressController@storeAddress')->name('customer.storeAddress');
        Route::post('/update-address', 'CustomerAddressController@updateAddress')->name('customer.updateAddress');

        Route::post('/delete-address-by-ajax', 'CustomerAddressController@deleteAddress')->name('customer.deleteAddress');

        Route::post('/checkout', 'CustomerOnlineOrderController@checkout')->name('customer.checkout');
        Route::post('/placed-online-order', 'CustomerOnlineOrderController@placedOnlineOrder')->name('customer.placedOnlineOrder');
        Route::get('/order-success/{id}', 'CustomerOnlineOrderController@orderSuccess')->name('customer.orderSuccess');

        Route::post('/table-reservation', 'CustomerReservationController@tableReservation')->name('table.reservation');



    });

});
