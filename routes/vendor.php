<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ServiceCategoryController;
use App\Http\Controllers\Backend\ServiceProductController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;

/** admin Routes  */
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

// profile routes

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

//ecommerce
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.changeStatus');
Route::resource('category', CategoryController::class);
Route::put('subCategory-change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.changeStatus');
Route::resource('sub-category', SubCategoryController::class);

// Brand Routes
Route::resource('brand', BrandController::class);
Route::get('product/get-subCategories', [ProductController::class, 'getSubCategories'])->name('product.get-subCategories');
Route::put('product/changeStatus', [ProductController::class, 'changeStatus'])->name('product.changeStatus');
Route::resource('product', ProductController::class);
Route::resource('products-image-gallery', ProductImageGalleryController::class);

Route::put('shipping-rule-changeStatus', [ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.changeStatus');
Route::resource('shipping-rule', ShippingRuleController::class);

//items
Route::get('products-variant/{product}', [ProductVariantController::class, 'index'])->name('products-variant.index');
Route::get('products-variant', [ProductVariantController::class, 'create'])->name('products-variant.create');
Route::post('products-variant', [ProductVariantController::class, 'store'])->name('products-variant.store');
Route::get('products-variant-edit/{id}', [ProductVariantController::class, 'edit'])->name('products-variant.edit');
Route::put('products-variant-update/{id}', [ProductVariantController::class, 'update'])->name('products-variant.update');
Route::put('products-variant', [ProductVariantController::class, 'changeStatus'])->name('products-variant.changeStatus');
Route::delete('products-variant/{id}', [ProductVariantController::class, 'destroy'])->name('products-variant.destroy');

Route::resource('coupons', CouponController::class);
Route::resource('service-category', ServiceCategoryController::class);
Route::put('service-category-changeStatus', [ServiceCategoryController::class, 'changeStatus'])->name('service-category.changeStatus');

Route::resource('service-product', ServiceProductController::class);
Route::put('service-product-changeStatus', [ServiceProductController::class, 'changeStatus'])->name('service-product.changeStatus');


Route::resource('order', OrderController::class);