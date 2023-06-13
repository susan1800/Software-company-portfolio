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
include('admin.php');

// Route::get('/', function () {
//     return view('frontend.index');
// })->name('index');


Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/service', 'ServiceController@index')->name('service');
Route::get('/team', 'TeamController@index')->name('team');
Route::get('/testimonial', 'TestimonialController@index')->name('testimonial');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/blog', 'BlogsController@index')->name('blog');
Route::get('{cid}/blogbycategory', 'BlogsController@blogByCategory')->name('blogbycategory');
Route::get('{bid}/blogdetails', 'BlogsController@show')->name('blogdetails');
Route::get('/project', 'PortfolioController@index')->name('project');

Route::post('/contactmail', 'MailController@message')->name('contactmail');
Route::post('/subscription', 'subscriptionController@create')->name('subscription');
Route::get('/search', 'SearchController@search')->name('search');



// Route::get('/about', function () {
//     return view('frontend.about');
// })->name('about');
// Route::get('/blogdetails/1', function () {
//     return view('frontend.blogdetails');
// })->name('blogdetails');
// Route::get('/project', function () {
//     return view('frontend.project');
// })->name('project');
// Route::get('/service', function () {
//     return view('frontend.service');
// })->name('service');
// Route::get('/team', function () {
//     return view('frontend.team');
// })->name('team');
// Route::get('/testimonial', function () {
//     return view('frontend.testimonial');
// })->name('testimonial');

Route::get('/404', function () {
    return view('frontend.404');
})->name('404');
