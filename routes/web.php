<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubSubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DiscountCodeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('register', [LoginController::class, 'register']);

Route::controller(LoginController::class)->group(function () {
   Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/users', 'store');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{categorySlug}/{subCategorySlug}/{subSubCategorySlug}', [CategoryController::class, 'viewSubSub']);
Route::get('/category/{categorySlug}/{subCategorySlug}', [CategoryController::class, 'viewSub']);
Route::get('/category/{categorySlug}', [CategoryController::class, 'view']);
Route::get('/categories/get-sub-categories', [CategoryController::class, 'getSubCategories']);
Route::get('/sub-categories/get-sub-sub-categories', [CategoryController::class, 'getSubSubCategories']);
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/organised-play', [EventsController::class, 'organisedPlay'])->name('organised-play');

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index');
    Route::get('/blog/{slug}', 'show');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products/search', 'search');
    Route::get('/products/filter', 'filter');
    Route::get('/search-results', 'searchResults');
    Route::get('/search-results/filter', 'searchResultsFilter');
    Route::get('/product/{productSlug}', 'view');

});

Route::controller(CartController::class)->group(function () {
    Route::get('cart', 'cart')->name('cart');
    Route::post('checkout', 'checkout')->name('checkout');
    Route::post('cart/{id}', 'addToCart');
    Route::post('update-cart', 'updateCart');
    Route::post('apply-discount', 'applyDiscount');
    Route::delete('cart/{id}', 'removeFromCart');
});

Route::controller(CheckoutController::class)->group(function () {
    Route::post('complete-checkout', 'store')->name('complete-checkout');
});

Route::middleware('auth')->group(function () {

    Route::controller(LoginController::class)->group(function () {
        Route::post('/logout',  'destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/my-account',  'myAccount')->name('myaccount');
        Route::post('/update-user/{user}',  'update');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('/orders/invoice/{orderId}', 'generatePDF')->name('pdf.generate');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::post('update-product-rating/{product}', 'updateRating');
        Route::post('add-to-wishlist/{product}', 'addToWishlist');
        Route::delete('wishlist/{id}', 'removeFromWishlist');
        Route::post('move-to-cart/{id}', 'moveToCart');
    });

    Route::middleware('admin')->group(function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index');
        });

        Route::controller(EventsController::class)->group(function () {
            Route::get('dashboard/events', 'indexAdmin')->name('events.indexAdmin');
            Route::post('dashboard/events', 'store');
            Route::post('dashboard/events/status/{eventId}', 'updateStatus');
            Route::post('dashboard/events/{event}', 'update');
            Route::delete('dashboard/events/{event}', 'delete');
            Route::delete('dashboard/events/{event}/destroy', 'forceDelete');
            Route::get('dashboard/events/restore/{eventId}', 'restore');
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::get('dashboard/categories', 'index')->name('categories.index');
            Route::post('dashboard/categories', 'store');
            Route::post('dashboard/categories/status/{categoryId}', 'updateStatus');
            Route::post('dashboard/categories/{category}', 'update');
            Route::delete('dashboard/categories/{category}', 'delete');
            Route::delete('dashboard/categories/{category}/destroy', 'forceDelete');
            Route::get('dashboard/categories/restore/{categoryId}', 'restore');
        });

        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('dashboard/sub-categories', 'index')->name('sub-categories.index');
            Route::get('dashboard/category-sub-categories/{category}', 'getCategorySubCategories');
            Route::post('dashboard/sub-categories', 'store');
            Route::post('dashboard/sub-categories/status/{subCategoryId}', 'updateStatus');
            Route::post('dashboard/sub-categories/{subCategory}', 'update');
            Route::delete('dashboard/sub-categories/{subCategory}', 'delete');
            Route::delete('dashboard/sub-categories/{subCategory}/destroy', 'forceDelete');
            Route::get('dashboard/sub-categories/restore/{subCategoryId}', 'restore');
        });

        Route::controller(SubSubCategoryController::class)->group(function () {
            Route::get('dashboard/sub-sub-categories', 'index')->name('sub-sub-categories.index');
            Route::get('dashboard/sub-category-sub-sub-categories/{subCategory}', 'getSubCategorySubSubCategories');
            Route::post('dashboard/sub-sub-categories', 'store');
            Route::post('dashboard/sub-sub-categories/status/{subSubCategoryId}', 'updateStatus');
            Route::post('dashboard/sub-sub-categories/{subSubCategory}', 'update');
            Route::delete('dashboard/sub-sub-categories/{subSubCategory}', 'delete');
            Route::delete('dashboard/sub-sub-categories/{subSubCategory}/destroy', 'forceDelete');
            Route::get('dashboard/sub-sub-categories/restore/{subSubCategoryId}', 'restore');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('dashboard/products', 'index')->name('products.index');
            Route::post('dashboard/products', 'store');
            Route::post('dashboard/products/status/{product}', 'updateStatus');
            Route::post('dashboard/products/{product}', 'update');
            Route::delete('dashboard/products/{product}', 'delete');
            Route::delete('dashboard/products/{product}/destroy', 'forceDelete');
            Route::get('dashboard/products/restore/{productId}', 'restore');
            Route::post('dashboard/import/products/', 'import');
            
        });

        Route::controller(DiscountCodeController::class)->group(function () {
            Route::get('dashboard/discount-codes', 'index')->name('discount-codes.index');
            Route::post('dashboard/discount-codes', 'store');
            Route::post('dashboard/discount-codes/status/{discountCode}', 'updateStatus');
            Route::post('dashboard/discount-codes/{discountCode}', 'update');
            Route::delete('dashboard/discount-codes/{discountCode}', 'delete');
            Route::delete('dashboard/discount-codes/{discountCode}/destroy', 'forceDelete');
            Route::get('dashboard/discount-codes/restore/{discountCodeId}', 'restore');
        });

        Route::controller(SlideController::class)->group(function () {
            Route::get('dashboard/slides', 'index')->name('slides.index');
            Route::post('dashboard/slides', 'store');
            Route::post('dashboard/slides/status/{slideId}', 'updateStatus');
            Route::post('dashboard/slides/{slide}', 'update');
            Route::delete('dashboard/slides/{slide}', 'delete');
            Route::delete('dashboard/slides/{slide}/destroy', 'forceDelete');
            Route::get('dashboard/slides/restore/{slideId}', 'restore');
        });

        Route::controller(BlogController::class)->group(function () {
            Route::get('dashboard/blog-posts', 'indexAdmin')->name('blog-posts.index');
            Route::post('dashboard/blog-posts', 'store');
            Route::post('dashboard/blog-posts/status/{blogPostId}', 'updateStatus');
            Route::post('dashboard/blog-posts/{blogPost}', 'update');
            Route::delete('dashboard/blog-posts/{blogPost}', 'delete');
            Route::delete('dashboard/blog-posts/{blogPost}/destroy', 'forceDelete');
            Route::get('dashboard/blog-posts/restore/{blogPostId}', 'restore');
        });

        Route::controller(OrderController::class)->group(function () {
            Route::get('dashboard/orders', 'indexAdmin')->name('orders.index');
            Route::get('dashboard/orders/{orderId}', 'show');
            Route::post('dashboard/orders/markshipped/{orderId}', 'markAsShipped');
            Route::get('dashboard/orders/shippinglabel/{orderId}', 'generatePDF')->name('pdf.generate');
            Route::post('dashboard/orders', 'store');
            Route::post('dashboard/orders/status/{orderId}', 'updateStatus');
            Route::post('dashboard/orders/{order}', 'update');
            Route::delete('dashboard/orders/{order}', 'delete');
            Route::delete('dashboard/orders/{order}/destroy', 'forceDelete');
            Route::get('dashboard/orders/restore/{order}', 'restore');
        });

    });

    // Route::controller(UserController::class)->group(function () {
    //     Route::get('/users', 'index');
    //     Route::post('/users', 'store');
    //     Route::get('/users/create', 'create')->middleware('can:create, App\Models\User');
    // });
});
