<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CompanyDetailController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\InquiryController;
use App\Http\Controllers\Backend\InquirySliderController;
use App\Http\Controllers\Backend\OfferController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\PrivacyPolicyController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ServiceCategoryController;
use App\Http\Controllers\Backend\ServiceProductController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SiteInfoController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TermsAndConditionsController;
use Illuminate\Support\Facades\Route;

/** admin Routes  */
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

// profile routes

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

// slider

Route::resource('slider', SliderController::class);

//inquirty
Route::resource('inquirySlider', InquirySliderController::class);
Route::resource('about', AboutController::class);
Route::resource('companyDetail', CompanyDetailController::class);
Route::get('hotelInquiry', [InquiryController::class, 'hotel'])->name('inquiry.hotel');
Route::get('cabInquiry', [InquiryController::class, 'cab'])->name('inquiry.cab');
Route::get('services', [InquiryController::class, 'services'])->name('inquiry.services');
Route::post('cabInquiryStatusChange', [InquiryController::class, 'cabStatusChange'])->name('inquiry.cab.changeStatus');
Route::post('serviceInquiryStatusChange', [InquiryController::class, 'serviceStatusChange'])->name('inquiry.service.changeStatus');

//ecommerce
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.changeStatus');
Route::resource('category', CategoryController::class);
Route::put('subCategory-change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.changeStatus');
Route::resource('sub-category', SubCategoryController::class);

// Brand Routes
Route::resource('brand', BrandController::class);
Route::get('product/get-subCategories', [ProductController::class, 'getSubCategories'])->name('product.get-subCategories');
Route::put('product/changeStatus', [ProductController::class, 'changeStatus'])->name('product.changeStatus');
Route::put('product/changeApproval', [ProductController::class, 'changeApproval'])->name('product.changeApproval');
Route::resource('product', ProductController::class);
Route::resource('products-image-gallery', ProductImageGalleryController::class);

Route::put('shipping-rule-changeStatus', [ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.changeStatus');
Route::resource('shipping-rule', ShippingRuleController::class);

//items
Route::resource('package', PackageController::class);

Route::get('products-variant/{product}', [ProductVariantController::class, 'index'])->name('products-variant.index');
Route::get('products-variant', [ProductVariantController::class, 'create'])->name('products-variant.create');
Route::post('products-variant', [ProductVariantController::class, 'store'])->name('products-variant.store');
Route::get('products-variant-edit/{id}', [ProductVariantController::class, 'edit'])->name('products-variant.edit');
Route::put('products-variant-update/{id}', [ProductVariantController::class, 'update'])->name('products-variant.update');
Route::put('products-variant', [ProductVariantController::class, 'changeStatus'])->name('products-variant.changeStatus');
Route::delete('products-variant/{id}', [ProductVariantController::class, 'destroy'])->name('products-variant.destroy');

//e-commerce
Route::put('vendor-profile-changeStatus', [AdminVendorProfileController::class, 'changeStatus'])->name('vendor-profile.changeStatus');
Route::resource('vendor-profile', AdminVendorProfileController::class);

Route::resource('coupons', CouponController::class);
Route::resource('service-category', ServiceCategoryController::class);
Route::put('service-category-changeStatus', [ServiceCategoryController::class, 'changeStatus'])->name('service-category.changeStatus');

Route::resource('service-product', ServiceProductController::class);
Route::put('service-product-changeStatus', [ServiceProductController::class, 'changeStatus'])->name('service-product.changeStatus');

Route::put('coupons-changeStatus', [CouponController::class, 'changeStatus'])->name('coupons.changeStatus');

Route::resource('offer', OfferController::class);
Route::resource('siteInfo', SiteInfoController::class);
Route::put('offer-changeStatus', [OfferController::class, 'changeStatus'])->name('offer.changeStatus');

Route::get('order/delivered/{id}', [OrderController::class, 'delivered'])->name('order.delivered');
Route::resource('order', OrderController::class);
Route::get('order-status',[OrderController::class,'changeOrderStatus'])->name('order.status');
Route::get('payment-status',[OrderController::class,'changePaymentStatus'])->name('order.paymentstatus');

Route::resource('terms-and-conditions', TermsAndConditionsController::class);
Route::resource('privacy-policies', PrivacyPolicyController::class);