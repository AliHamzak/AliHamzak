<?php

use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffDepartment;
use App\Http\Controllers\staffpaymentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BannerController;
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

Route::get('/', function(){
    return view('welcome');
});
Route::get('/homes', [HomesController::class,'home']);
Route::get('service/{id}', [HomesController::class,'service_detail']);
Route::get('page/about_us', [PageController::class,'about_us']);
Route::get('page/contact_us', [PageController::class,'contact_us']);

//admin login
Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'check_login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'dashboard']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//banner
Route::get('admin/banner/{id}/delete', [BannerController::class, 'destroy']);
Route::resource('admin/banner', BannerController::class);

//Roomtype
Route::get('admin/roomtype/{id}/delete', [RoomtypeController::class, 'destroy']);
Route::resource('admin/roomtype', RoomtypeController::class);

//Room
Route::get('admin/rooms/{id}/delete', [RoomController::class, 'destroy']);
Route::resource('admin/rooms', RoomController::class);

//Customer
Route::get('admin/customer/{id}/delete', [CustomerController::class, 'destroy']);
Route::resource('admin/customer', CustomerController::class);

//Departemt
Route::get('admin/department/{id}/delete', [StaffDepartment::class, 'destroy']);
Route::resource('admin/department', StaffDepartment::class);

//Staff Departemt
Route::get('admin/staff/{id}/delete', [StaffController::class, 'destroy']);
Route::resource('admin/staff', StaffController::class);

//staff payment
Route::get('admin/staff/payment/{id}/delete', [StaffpaymentController::class,'destroy']);
Route::resource('admin/staff/payment', StaffpaymentController::class);

//room type image 
Route::get('admin/roomtypeimage/delete/{id}', [RoomtypeController::class,'destroy_image']);

 //Booking
Route::get('admin/booking/{id}/delete', [BookingController::class,'destroy']);
Route::get('admin/booking/available_rooms/{checkin_date}', [BookingController::class,'available_room']);
Route::resource('admin/booking', BookingController::class);

//customer auth
Route::get('logins', [CustomerController::class, 'logins']);
Route::post('customer/logins', [CustomerController::class, 'customer_logins']);
Route::get('registers', [CustomerController::class, 'registers']);
Route::get('logouts', [CustomerController::class, 'logout']);

Route::get('booking', [BookingController::class, 'front_booking']);
Route::get('booking/success',[BookingController::class,'booking_payment_success']);
Route::get('booking/fail',[BookingController::class,'booking_payment_fail']);

//Service Departemt
Route::get('admin/service/{id}/delete', [ServiceController::class, 'destroy']);
Route::resource('admin/service', ServiceController::class);

//testimonial
Route::get('customer/add-testimonial', [HomesController::class, 'add_testimonial']);
Route::post('customer/save-testimonial', [HomesController::class, 'save_testimonial']);
Route::get('admin/testimonial', [adminController::class, 'testimonial']);
Route::get('admin/testimonial/{id}/delete', [adminController::class, 'destroy_testimonial']);
Route::post('save-contactus',[PageController::class,'save_contactus']);