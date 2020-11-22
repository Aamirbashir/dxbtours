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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::group(["as" => "admin.",'prefix' => 'admin-panel' ], function () {
        Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
  'as' => 'password.email',
  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
  'as' => 'password.update',
  'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
  'as' => 'register',
  'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
  'as' => '',
  'uses' => 'Auth\RegisterController@register'
]);
Route::group(['namespace' => 'admin','middleware' => ['auth']], function () {


    Route::get('','dashboardController@index')->name('dashboard');

    Route::group(['as' => 'social-links-', 'prefix' => 'social-links'],function(){
        Route::get('/','socialLinksController@index')->name('index');
        Route::get('/add/{id?}','socialLinksController@add')->name('add');
        Route::post('/add-post/{id?}','socialLinksController@addPost')->name('add-post');
        Route::get('/delete/{id?}','socialLinksController@deletePost')->name('delete');
    });

    Route::group(['as' => 'header-text-', 'prefix' => 'header-text'],function(){
        Route::get('/','headerTextController@index')->name('index');
        Route::get('/add/{id?}','headerTextController@add')->name('add');
        Route::post('/add-post/{id?}','headerTextController@addPost')->name('add-post');
        Route::get('/delete/{id?}','headerTextController@deletePost')->name('delete');

    });

    Route::group(['as' => 'about-us-', 'prefix' => 'about-us'],function(){
        Route::get('/','aboutUsController@index')->name('index');
        Route::get('/add/{id?}','aboutUsController@add')->name('add');
        Route::post('/add-post/{id?}','aboutUsController@addPost')->name('add-post');
    });

    Route::group(['as' => 'page-about-us-', 'prefix' => 'page-about-us'],function(){
        Route::get('/','pageAboutUsController@index')->name('index');
        Route::get('/add/{id?}','pageAboutUsController@add')->name('add');
        Route::post('/add-post/{id?}','pageAboutUsController@addPost')->name('add-post');
    });

    Route::group(['as' => 'services-', 'prefix' => 'services'],function(){
        Route::get('/','servicesController@index')->name('index');
        Route::get('/add/{id?}','servicesController@add')->name('add');
        Route::post('/add-post/{id?}','servicesController@addPost')->name('add-post');
        Route::get('/delete/{id?}','servicesController@deletePost')->name('delete');

    });

     Route::group(['as' => 'products-', 'prefix' => 'products'],function(){
        Route::get('/','productsController@index')->name('index');
        Route::get('/add/{id?}','productsController@add')->name('add');
        Route::post('/add-post/{id?}','productsController@addPost')->name('add-post');
        Route::get('/delete/{id?}','productsController@deletePost')->name('delete');

    });
    Route::group(['as' => 'gallery-', 'prefix' => 'gallery'], function () {
    Route::get('/', 'galleryController@index')->name('index');
    Route::get('/add/{id?}', 'galleryController@add')->name('add');
    Route::post('/add-post/{id?}', 'galleryController@addPost')->name('add-post');
    Route::get('/delete/{id?}', 'galleryController@deletePost')->name('delete');

});



    Route::group(['as' => 'our-team-', 'prefix' => 'our-team'],function(){
        Route::get('/','ourTeamController@index')->name('index');
        Route::get('/add/{id?}','ourTeamController@add')->name('add');
        Route::post('/add-post/{id?}','ourTeamController@addPost')->name('add-post');
        Route::get('/delete/{id?}','ourTeamController@deletePost')->name('delete');

    });

     Route::group(['as' => 'bookings-', 'prefix' => 'bookings'],function(){
        Route::get('/','bookingsController@index')->name('index');
        Route::get('/confirmBookings/{date?}','bookingsController@confirmBookings')->name('confirmBookings');
        Route::get('/add/{id?}','bookingsController@add')->name('add');
        Route::post('/add-post/{id?}','bookingsController@addPost')->name('add-post');
    });

     Route::group(['as' => 'settings-', 'prefix' => 'settings'],function(){
        Route::get('/sitemap','settingsController@sitemap')->name('sitemap');
    
    });
});
});
Route::group(["as" => "pages."], function () {

    Route::get('/', 'MainController@index')->name('webhome');

//    Route::group(['prefix' => '/blog', "as" => "blog."], function () {
//        Route::get('/', 'MainController@blog_listing')->name('index');
//        Route::get('/detail', 'MainController@blog_detail')->name('detail');
//    });

    Route::group(['prefix' => '/recipe', "as" => "recipe."], function () {
        Route::get('/detail', 'MainController@recipe_detail')->name('detail');
    });
     Route::get('services/{slug}', 'MainController@products')->name('services');
     Route::get('products/{slug}', 'MainController@singleProduct')->name('products');
    Route::post('quickquots','MainController@quickquots')->name('quickquots');



    Route::get('/about-us', 'MainController@about_us')->name('about-us');

    Route::get('/contact-us', 'MainController@contact_us')->name('contact-us');
    Route::get('/our-team', 'MainController@our_team')->name('our-team');

    Route::get('/our-brands', 'MainController@our_brands')->name('our-brands');

    Route::get('/franchising', 'MainController@franchising')->name('franchising');

    //Route::get('/services', 'MainController@services')->name('services');

    Route::get('/gallery', 'MainController@gallery')->name('gallery');

});



Route::get('get-file/{id?}','fileController@getFile')->name('get-file');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/sendEmail','HomeController@sendEmail');


