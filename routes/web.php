<?php
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\CollaboratorController;
use App\Http\Controllers\Frontend\CommonController;
use App\Http\Controllers\Frontend\FrontProductDetailController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\InquiryController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\WishlistController;
// use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('rolecheck')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/services', [HomeController::class, 'index'])->name('services');
    Route::get('/service-detail/{slug}', [InquiryController::class, 'serviceDetail'])->name('service-detail');
    Route::get('/service-inquiry/{slug}', [InquiryController::class, 'serviceInquiry'])->name('service-inquiry');
    Route::get('/service-search', [InquiryController::class, 'search'])->name('service.search');

    Route::post('/StoreServiceInquiry', [InquiryController::class, 'StoreServiceInquiry'])->name('StoreServiceInquiry');
    Route::get('/inquiry', [InquiryController::class, 'index'])->name('inquiry');
    Route::get('/about', [CommonController::class, 'about'])->name('about');
    Route::get('/contact', [CommonController::class, 'contact'])->name('contact');
    Route::post('/contact', [CommonController::class, 'contactAdd'])->name('contact.add');
    Route::get('/get-min-max-prices', [FrontProductDetailController::class, 'getMinMaxPrices'])->name('get-min-max-prices');
    Route::get('/get-products-by-price', [FrontProductDetailController::class, 'getProductsByPrice'])->name('get-products-by-price');

    Route::get('/product-list', [FrontProductDetailController::class, 'list'])->name('product-list');
    Route::get('/product-detail/{slug}', [FrontProductDetailController::class, 'showDetail'])->name('product-detail');
    Route::get('/product-search', [FrontProductDetailController::class, 'search'])->name('product.search');

    Route::get('/wishlist/add-product', [WishlistController::class, 'addToWishlist'])->name('wishlist.store');

    //variant data
    Route::post('/getVariantDetail', [FrontProductDetailController::class, 'variantDetails'])->name('getVariantDetail');

    //  cart Routes
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/cart-details', [CartController::class, 'cartDetails'])->name('cart-details');
    Route::get('/cart-clear', [CartController::class, 'cartClear'])->name('cart-clear');
    Route::post('/cart-remove', [CartController::class, 'cartRemove'])->name('cart-remove');
    Route::post('/cart-update-qty', [CartController::class, 'updateQty'])->name('cart.update-qty');
    Route::get('/apply-coupon', [CartController::class, 'applyCoupon'])->name('apply-coupon');
    Route::get('/calculate-discount', [CartController::class, 'calculateDiscount'])->name('calculate-discount');

    Route::get('/collaborator', [CollaboratorController::class, 'index'])->name('collaborator');
    Route::post('/create-collaborator', [CollaboratorController::class, 'store'])->name('collaborator.add');
});


Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/inquiry-hotel-inquiry', [InquiryController::class, 'hotel_inquiry'])->name('inquiry.hotel.inquiry');
    Route::post('/inquiry-cab-inquiry', [InquiryController::class, 'cab_inquiry'])->name('inquiry.cab.inquiry');

    //address

});

require __DIR__ . '/auth.php';

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => ['auth','verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::POST('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::resource('/user-address', UserAddressController::class);
    // Route::get('/profile', [WishlistController::class, 'index'])->name('profile');

    Route::get('/wishlist/remove/{id}', [WishlistController::class, 'removeWishlist'])->name('wishlist.delete');
    Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('/checkout/form-submit', [CheckOutController::class, 'checkOutFormSubmit'])->name('checkout.form-submit');
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');

    Route::post('/update-password', [UserProfileController::class, 'updatePassword'])->name('update.password');

    //wishlist
});