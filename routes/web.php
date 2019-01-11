<?php

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


// Admin  routes  for user
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Auth::routes();
    Route::get('password', 'UserController@getPassword');
    Route::post('password', 'UserController@postPassword');

    Route::get('/', 'VipResourceController@index')->name('home');

    Route::resource('banner', 'BannerResourceController');
    Route::post('/banner/destroyAll', 'BannerResourceController@destroyAll');

    Route::resource('system_page', 'SystemPageResourceController');
    Route::post('/system_page/destroyAll', 'SystemPageResourceController@destroyAll')->name('system_page.destroy_all');

    Route::get('/setting/company', 'SettingResourceController@company')->name('setting.company.index');
    Route::post('/setting/updateCompany', 'SettingResourceController@updateCompany');

    Route::resource('link', 'LinkResourceController');
    Route::post('/link/destroyAll', 'LinkResourceController@destroyAll')->name('link.destroy_all');

    Route::resource('vip', 'VipResourceController');
    Route::post('/vip/destroyAll', 'VipResourceController@destroyAll');
    Route::get('/rebates', 'VipResourceController@rebates')->name('vip.rebate.index');
    Route::get('/accounts_vips', 'VipResourceController@accountsVips')->name('vip.accounts_vips');

    Route::resource('vip_rebate', 'VipRebateResourceController');

    Route::resource('permission', 'PermissionResourceController');
    Route::resource('role', 'RoleResourceController');

    Route::group(['prefix' => 'page','as' => 'page.'], function ($router) {
        Route::resource('page', 'PageResourceController');
        Route::resource('category', 'PageCategoryResourceController');
    });
    Route::group(['prefix' => 'menu'], function ($router) {
        Route::get('index', 'MenuResourceController@index');
    });

    Route::post('/upload/{config}/{path?}', 'UploadController@upload')->where('path', '(.*)');

    Route::resource('admin_user', 'AdminUserResourceController');
    Route::post('/admin_user/destroyAll', 'AdminUserResourceController@destroyAll')->name('admin_user.destroy_all');
    Route::resource('permission', 'PermissionResourceController');
    Route::post('/permission/destroyAll', 'PermissionResourceController@destroyAll')->name('permission.destroy_all');
    Route::resource('role', 'RoleResourceController');
    Route::post('/role/destroyAll', 'RoleResourceController@destroyAll')->name('role.destroy_all');
    Route::get('logout', 'Auth\LoginController@logout');
});

Route::group([
    'namespace' => 'Wap',
], function () {
    Route::get('user/login', 'Auth\LoginController@showLoginForm');
    Route::post('user/login', 'Auth\LoginController@login');
    Route::get('user/logout', 'Auth\LoginController@logout');
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/vip','VipController@home');
    Route::post('/vip/upgrade','VipController@upgrade');
    Route::get('/rebate','RebateController@home');


});


//Route::get('
///{slug}.html', 'PagePublicController@getPage');
/*
Route::group(
    [
        'prefix' => trans_setlocale() . '/admin/menu',
    ], function () {
    Route::post('menu/{id}/tree', 'MenuResourceController@tree');
    Route::get('menu/{id}/test', 'MenuResourceController@test');
    Route::get('menu/{id}/nested', 'MenuResourceController@nested');

    Route::resource('menu', 'MenuResourceController');
   // Route::resource('submenu', 'SubMenuResourceController');
});
*/