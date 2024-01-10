<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheifController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SiteMapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/sitemap',function(){
//     SitemapGenerator::create( 'http://localhost' )->writeToFile(public_path('sitemap.xml'));
// })->name('sitemap-generator');
Route::get('sitemap',[SiteMapController::class,'index']);

Route::get('/',[FoodController::class,'food_home'])->name('home');
Route::get('testimonials',[FoodController::class,'testimonials'] )->name('testimonials');
Route::get('login-signup',[LoginController::class,'login_page'])->name('login');
Route::post('user-login',[LoginController::class,'user_login'])->name('user_login');
Route::post('user-registration',[LoginController::class,'user_registration'])->name('user_registration');
Route::get('user-logout',[LoginController::class,'logout'])->name('logout');
Route::post('submit-review',[ReviewController::class,'submit_review'])->name('submit_review');

Route::get('user-profile' ,[ProfileController::class,'user_profile'])->name('profile');
Route::post('update-profile-picture',[ProfileController::class,'update_profile_picture'])->name('update_profile_picture');
Route::post('update-profile-data',[ProfileController::class,'update_profile_data'])->name('update_profile_data');

Route::get('menu',[MenuController::class,'menu'])->name('menu');

Route::get('test',[FoodController::class,'test']);

Route::get('adminDashboard',[AdminController::class,'adminDashboard'])->name('adminDashboard');
Route::get('menu-listing',[AdminController::class,'menu_listing'])->name('menu_listing');
Route::post('add-food',[AdminController::class,'add_food'])->name('add_food');
Route::get('add-chief', [AdminController::class,'add_chief'])->name('add_chief');
Route::post('add-new-chief',[AdminController::class,'add_new_chief'])->name('add_new_chief');
Route::get('admin-coupons', [AdminController::class,'coupons'])->name('coupons');
Route::post('admin-add-new-coupon', [AdminController::class,'add_new_coupon'])->name('add_new_coupon');
Route::get('get_coupons_data', [AdminController::class, 'getCouponsData'])->name('get_coupons_data');
Route::post('/delete-coupon/{id}',[AdminController::class,'delete_coupon'])->name('delete_coupon');
Route::get('get-coupon-data/{id}', [AdminController::class,'getcoupondata'])->name('getcoupondata');
Route::post('update-coupon', [AdminController::class,'update_coupon'])->name('update_coupon');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/add-ingrediants', [CategoryController::class, 'store']);


Route::get('Chief',[CheifController::class,'Chief'])->name('cheif');


Route::get('checkout',[FoodController::class,'checkout'])->name('checkout');
Route::get('get-Coupions', [FoodController::class,'get_Coupons'])->name('get_Coupons');
Route::post('pay',[PaymentController::class,'pay'])->name('pay');
Route::get('success', [PaymentController::class,'success']);
Route::get('error', [PaymentController::class,'error']);

Route::post('add-to-cart',[FoodController::class,'add_to_cart'])->name('add_to_cart');
