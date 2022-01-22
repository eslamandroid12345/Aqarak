<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



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

//define('MXA_PAGINATE',21);





    Route::get('/', 'HouseController@welcome');
    Auth::routes();
    Route::get('/home', 'HouseController@home')->name('home');
    Route::get('about','HouseController@about')->name('about');
    Route::get('houses/data','HouseController@index')->name('houses.data');//finish
    Route::get('show/{house}','HouseController@show')->name('houses.show');//finish




//Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){


//route for sale
Route::group(['prefix'=>'houses','middleware'=>'auth:web'], function (){


    Route::get('sale','HouseController@sale')->name('houses.sale');;//finish
    Route::get('create','HouseController@create')->name('houses.create');//finish
    Route::post('store','HouseController@store')->name('houses.store');
    Route::get('destroy/{house}','HouseController@destroy')->name('houses.destroy');
    Route::put('update/{house}','HouseController@update')->name('houses.update');
    //Route trashed data and restore them
    Route::get('trashed','HouseController@trashed')->name('houses.trashed');
    Route::get('back/{id}','HouseController@back')->name('houses.back');
    Route::get('delete/{id}','HouseController@delete')->name('houses.delete');


    Route::get('edit/user/{house}','HouseController@edit')->name('houses.edit.user');



});



//start admin of dashboard
    Route::get('admin/login','AdminController@adminLoginData')->name('admin.login')->middleware('check');//return view login for admin
    Route::post('admin/open','AdminController@adminLogin')->name('admin.open');//open data to login dashboard


           Route::group(['prefix'=>'admin','middleware'=>'auth:admin'], function (){

           //prefix admin/
           Route::get('sales','AdminController@getHouses')->name('admin.sales');//return view sales for admin
           Route::get('users','AdminController@users')->name('admin.users');//return view users for admin
           Route::get('soft/{id}','AdminController@soft')->name('admin.soft');//return view delete user for admin
           Route::get('sales/delete/{id}','AdminController@salaesDelete')->name('admin.sales.delete');//return delete sales dont access for admin
           Route::get('show/{house}','AdminController@show')->name('admin.show');//return view sales show for admin
           Route::get('trashed','AdminController@salesTrashed')->name('admin.trashed');//return view trashed sales for admin

          Route::put('update/access/{house}','HouseController@update')->name('admin.update.access');//to update house for user



         Route::put('update/{house}','AdminController@update')->name('admin.update');//return edit status sales for admin
         Route::get('edit/{house}','AdminController@edit')->name('admin.edit');//return update status sales for admin
         Route::get('access','AdminController@access')->name('admin.access');//return update status sales for admin
         Route::get('user/delete/{id}','AdminController@deleteUser')->name('admin.user.delete');//return update status sales for admin
         Route::get('home', 'AdminController@homeData')->name('admin.home');

        //Routs of home sales
        Route::post('company/rate','RateController@rate')->name('admin.company.rate');
        Route::get('company/rate/register','RateController@register')->name('admin.company.rate.register');
        Route::get('company/rate/show','RateController@rateShow')->name('admin.company.rate.show');

     });
//end admin of dashboard


//});
