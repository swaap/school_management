<?php

Route::group(array('module' => 'Admin', 'namespace' => 'App\EnlModules\admin\Controllers', 'middleware' => ['web', 'auth', 'checkLanguage'], 'as' => 'admin::'), function() {

    Route::get('/home', 'AdminController@index');
    Route::get('/dispatchEmail', 'AdminController@dispatchEmail');
    Route::post('/change-language', 'AdminController@changeLanguage');

    
    /*
     * Global Setting route start here
     */
    Route::get('/global-setting/', 'GlobalSettingController@index');
    Route::get('/get-all-global-setting', 'GlobalSettingController@getGlobalSettingData');
    Route::get('/global-setting/edit/{global_setting_id}', 'GlobalSettingController@editGlobalSetting');
    Route::post('/global-setting/edit/{global_setting_id}', 'GlobalSettingController@editGlobalSettingPost');
    /*
     * Global Setting route end here
     */

    /*
     * User Management route start here
     */
    Route::get('/user/', 'UserController@index');
    Route::get('/get-all-user', 'UserController@getUserData');
    Route::get('/user/edit/{user_id}', 'UserController@editUser');
    Route::post('/user/edit/{user_id}', 'UserController@editUserPost');
    Route::get('/user/add', 'UserController@addUser');
    Route::post('/user/add', 'UserController@addUserPost');
    Route::post('/user/delete/{user_id}', 'UserController@deleteUser');
    Route::post('/user/check-email-exist', 'UserController@checkEmailExist');
    /*
     * User Management route end here
     */

/*
* My Orders
*/
   Route::get('/orders', 'OrderController@index');
   Route::get('/get-all-orders', 'OrderController@getOrderData');
   Route::get('/order/edit/{order_id}', 'OrderController@editOrder');
   Route::post('/post-item-price/{order_id}', 'OrderController@editPostOrder');

/*
* My Orders
*/

    Route::get('/error-404', function () {
        return view('error-404');
    });
});
