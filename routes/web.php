<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Livewire\Admin\AdminAskInformationComponent;
use App\Http\Livewire\Admin\AdminAttributeComponent;
use App\Http\Livewire\Admin\AdminBrandComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminSettingWebSite;
use App\Http\Livewire\Admin\AdminUsersComponent;
use App\Http\Livewire\BrandComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\WishlistComponent;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', HomeComponent::class)->name('home');

Route::get('/shop', ShopComponent::class)->name('shop');

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

Route::get('/product-brand', BrandComponent::class)->name('product.brand');

Route::get('/search', SearchComponent::class)->name('product.search');

Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');

Route::get('/contact-us', ContactComponent::class)->name('contact-us');

Route::get('/auth/facebook/redirect', [FacebookController::class, 'handleFacebookRedirect'])->name('auth.redirect-facebook');
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback'])->name('auth.callback-facebook');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

//  For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/order', UserOrderComponent::class)->name('user.order');
    Route::get('/user/change-password', UserChangePasswordComponent::class)->name('user.password');
    Route::get('/user/profile', UserProfileComponent::class)->name('user.profile');
});

//  For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');

    Route::get('/admin/brands', AdminBrandComponent::class)->name('admin.brands');

    Route::get('/admin/ask', AdminAskInformationComponent::class)->name('admin.ask');

    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');

    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');

    Route::get('/admin/slider/all', [AdminHomeSliderComponent::class, 'getAll'])->name('admin.sliderall');

    Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/setting-website', AdminSettingWebSite::class)->name('admin.website');

    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/contact', AdminContactComponent::class)->name('admin.contact');

    Route::get('/admin/attributes', AdminAttributeComponent::class)->name('admin.attributes');

    Route::get('/admin/users', AdminUsersComponent::class)->name('admin.users');
});
