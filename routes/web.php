<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

//frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'index']);
Route::post('/search', [HomeController::class, 'search']);

Route::get('/category-product/{slug}', [HomeController::class, 'show_category_home']);
Route::get('/brand-product/{slug}', [HomeController::class, 'show_brand_home']);
Route::get('/detail-product/{slug}', [HomeController::class, 'details_product']);
//frontend Cart
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
//ajax cart
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/delete-cart/{session_id}', [CartController::class, 'delete_cart']);
Route::get('/delete-all-cart', [CartController::class, 'delete_all_cart']);
//frontend checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::get('/success-order', [CheckoutController::class, 'success_order']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::post('/confirm-order', [CheckoutController::class, 'confirm_order']);
//coupon
Route::post('/check-coupon', [CouponController::class, 'check_coupon']);
Route::get('/unset-coupon', [CouponController::class, 'unset_coupon']);
Route::get('/add-coupon', [CouponController::class, 'add_coupon']);
Route::post('/add-coupon-code', [CouponController::class, 'add_coupon_code']);
Route::get('/all-coupon', [CouponController::class, 'all_coupon']);
Route::get('/delete-coupon{coupon_id}', [CouponController::class, 'delete_coupon']);
//delivery
Route::get('/delivery', [DeliveryController::class, 'delivery']);
Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
Route::post('/insert-delivery', [DeliveryController::class, 'insert_delivery']);
Route::post('/select-feeship', [DeliveryController::class, 'select_feeship']);
Route::post('/update-feeship', [DeliveryController::class, 'update_feeship']);
// Route::post('/select-delivery-home', [DeliveryController::class, 'select_delivery_home']);
Route::post('/calculate-fee', [DeliveryController::class, 'calculate_fee']);
Route::get('/unset-fee', [DeliveryController::class, 'unset_fee']);

//send mail
Route::get('/send-mail', [HomeController::class, 'send_mail']);
//login-facebook
Route::get('/login-facebook', [AdminController::class, 'login_facebook']);
Route::get('/admin/callback', [AdminController::class, 'callback_facebook']);
//login-google
Route::get('/login-google', [AdminController::class, 'login_google']);
Route::get('/google/callback', [AdminController::class, 'callback_google']);


//backend
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/dashboard',[AdminController::class, 'show_dashboard']);
Route::get('/logout',[AdminController::class, 'logout']);
Route::post('/admin-dashboard',[AdminController::class, 'dashboard']);
//backend category product
Route::get('/add-category-product',[CategoryProduct::class, 'add_category_product']);
Route::get('/all-category-product',[CategoryProduct::class, 'all_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);
Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class, 'active_category_product']);
Route::post('/save-category-product',[CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);
//import-export csv
Route::post('/import',[CategoryProduct::class, 'import_csv']);
Route::post('/export',[CategoryProduct::class, 'export_csv']);

//backend brand product
Route::get('/add-brand-product',[BrandProduct::class, 'add_brand_product']);
Route::get('/all-brand-product',[BrandProduct::class, 'all_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::get('/unactive-brand-product/{brand_product_id}',[BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}',[BrandProduct::class, 'active_brand_product']);
Route::post('/save-brand-product',[BrandProduct::class, 'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);
//backend Products
Route::group(['middleware' => 'roles'], function () {
    Route::get('/add-product', [ProductController::class, 'add_product']);
    Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
    Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
    Route::get('/all-product', [ProductController::class, 'all_product']);
    Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
    Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
    Route::post('/save-product', [ProductController::class, 'save_product']);
    Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);
});
//backend order
Route::get('/manage-order', [CheckoutController::class, 'manage_order']);
// Route::get('/view-order/{order_id}', [CheckoutController::class, 'view_order']);
Route::get('/delete-order/{order_id}', [CheckoutController::class, 'delete_order']);
Route::get('/manager-order', [OrderController::class, 'manager_order']);
Route::get('/view-order/{order_code}', [OrderController::class, 'view_order']);
Route::get('/print-order/{checkout_code}', [OrderController::class, 'print_order']);
Route::post('/update-order-status', [OrderController::class, 'update_order_status']);
Route::post('/update-quantity-order', [OrderController::class, 'update_quantity_order']);

//backend info
Route::get('/all-info', [InfoController::class, 'all_info']);
Route::post('/update-info/{info_id}', [InfoController::class, 'update_info']);

//backend slider
Route::get('/all-slider', [SliderController::class, 'all_slider']);
Route::get('/add-slider', [SliderController::class, 'add_slider']);
Route::post('/insert-slider', [SliderController::class, 'insert_slider']);
Route::get('/edit-slider/{slider_id}', [SliderController::class, 'edit_slider']);
Route::post('/update-slider/{slider_id}', [SliderController::class, 'update_slider']);
Route::get('/delete-slider/{slider_id}', [SliderController::class, 'delete_slider']);
Route::get('/unactive-slider/{slider_id}', [SliderController::class, 'unactive_slider']);
Route::get('/active-slider/{slider_id}', [SliderController::class, 'active_slider']);

//Authentication roles
Route::get('/register-auth', [AuthController::class, 'register_auth']);
Route::get('/login-auth', [AuthController::class, 'login_auth']);
Route::get('/logout-auth', [AuthController::class, 'logout_auth']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'roles'], function () {
    Route::get('/all-user', [UserController::class, 'all_user']);
    Route::get('/add-user', [UserController::class, 'add_user']);
    Route::post('/insert-user', [UserController::class, 'insert_user']);
    Route::post('/assign-roles', [UserController::class, 'assign_roles']);
    Route::get('/delete-user-roles/{admin_id}', [UserController::class, 'delete_user_roles']);
    Route::get('/impersonate/{admin_id}', [UserController::class, 'impersonate']);
    Route::get('/impersonate-leave', [UserController::class, 'impersonate_leave']);
});
