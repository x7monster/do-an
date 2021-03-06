<?php

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

Route::group(['namespace' => 'Frontend'], function() {
	Route::get('/','FrontendController@index')->name('index');
	Route::get('about-us','FrontendController@aboutUs')->name('about.us');
	Route::get('news-us','FrontendController@newsUs')->name('news.us');
	Route::get('/news/details/{id}','FrontendController@newsDetails')->name('news.details');
	Route::get('contact-us','FrontendController@contactUs')->name('contact.us');
	Route::post('/contact/store','FrontendController@store')->name('contact.store');

	Route::get('/shopping/cart','FrontendController@shoppingCart')->name('shopping.cart');
	Route::get('products','FrontendController@productList')->name('products.list');
	Route::get('/product-category/{category_id}','FrontendController@categoryWiseProduct')->name('category.wise.product');
	Route::get('/product-brand/{brand_id}','FrontendController@brandWiseProduct')->name('brand.wise.product');
	Route::get('/product-details/{slug}','FrontendController@productDetails')->name('products.details.info');
	Route::post('find-product','FrontendController@findProduct')->name('find.product');
	Route::get('/get-product','FrontendController@getProduct')->name('get.product');

	// Wish list
	Route::resource('/wishlists', 'WishlistController')->except('create', 'show', 'update');

	//Shopping-Cart
	Route::post('/add-to-cart','CartController@addtoCart')->name('insert.cart');
	Route::get('/show-cart','CartController@showCart')->name('show.cart');
	Route::post('/update-cart','CartController@updateCart')->name('update.cart');
	Route::get('/delete-cart/{rowId}','CartController@deleteCart')->name('delete.cart');

	Route::get('/customer-login','CheckoutController@customerLogin')->name('customer.login');
	Route::get('/customer-signup','CheckoutController@customerSignup')->name('customer.signup');
	Route::post('/signup-store','CheckoutController@signupStore')->name('signup.store');
	Route::get('/email-verify','CheckoutController@emailVerify')->name('email.verify');
	Route::post('/verify-store','CheckoutController@verifyStore')->name('verify.store');
	Route::get('checkout','CheckoutController@checkOut')->name('customer.checkout');
	Route::post('checkout/store','CheckoutController@checkoutStore')->name('customer.checkout.store');
});

Route::get('auth/redirect/{provider}', 'Auth\LoginSocialite@redirect')->name('authSocial_redirect');
Route::get('auth/callback/{provider}', 'Auth\LoginSocialite@callback');

Route::get('/communicate','Backend\ContactController@viewCommunicate')->name('contacts.communicate');
Route::get('/communicate/delete/{id}','Backend\ContactController@deleteCommunicate')->name('contacts.communicate.delete');


Auth::routes();
//customer-dashboard
Route::group(['middleware'=>['auth','customer']],function(){
	Route::get('/dashboard','Frontend\DashboardController@dashboard')->name('dashboard');
	Route::get('/customer-edit-profile','Frontend\DashboardController@editProfile')->name('customer.edit.profile');
	Route::post('/customer-update-profile','Frontend\DashboardController@updateProfile')->name('customer.update.profile');
	Route::get('/customer-password-change','Frontend\DashboardController@passwordChange')->name('customer.password.change');
	Route::post('/customer-password-update','Frontend\DashboardController@passwordUpdate')->name('customer.password.update');
	Route::get('/payment','Frontend\DashboardController@payment')->name('customer.payment');
	Route::post('/payment/store','Frontend\DashboardController@paymentStore')->name('customer.payment.store');
	Route::get('/order-list','Frontend\DashboardController@orderList')->name('customer.order.list');
	Route::get('/order-details/{id}','Frontend\DashboardController@orderDetails')->name('customer.order.details');
	Route::get('/order-print/{id}','Frontend\DashboardController@orderPrint')->name('customer.order.print');
});

Route::group(['middleware'=>['auth','admin']],function(){
	//admin-dashboard
	Route::get('/home', 'HomeController@index')->name('home');
	Route::prefix('users')->group(function(){
		Route::get('/view','Backend\UserController@view')->name('users.view');
		Route::get('/add','Backend\UserController@add')->name('users.add');
		Route::post('/store','Backend\UserController@store')->name('users.store');
		Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
		Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
		Route::get('/delete/{id}','Backend\UserController@delete')->name('users.delete');
	});

	Route::prefix('profiles')->group(function(){
		Route::get('/view','Backend\ProfileController@view')->name('profiles.view');
		Route::get('/edit','Backend\ProfileController@edit')->name('profiles.edit');
		Route::post('/store','Backend\ProfileController@update')->name('profiles.update');
		Route::get('/password/view','Backend\ProfileController@passwordView')->name('profiles.password.view');
		Route::post('/password/update','Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
	});

	Route::prefix('logos')->group(function(){
		Route::get('/view','Backend\LogoController@view')->name('logos.view');
		Route::get('/add','Backend\LogoController@add')->name('logos.add');
		Route::post('/store','Backend\LogoController@store')->name('logos.store');
		Route::get('/edit/{id}','Backend\LogoController@edit')->name('logos.edit');
		Route::post('/update/{id}','Backend\LogoController@update')->name('logos.update');
		Route::get('/delete/{id}','Backend\LogoController@delete')->name('logos.delete');
	});

	Route::prefix('sliders')->group(function(){
		Route::get('/view','Backend\SliderController@view')->name('sliders.view');
		Route::get('/add','Backend\SliderController@add')->name('sliders.add');
		Route::post('/store','Backend\SliderController@store')->name('sliders.store');
		Route::get('/edit/{id}','Backend\SliderController@edit')->name('sliders.edit');
		Route::post('/update/{id}','Backend\SliderController@update')->name('sliders.update');
		Route::get('/delete/{id}','Backend\SliderController@delete')->name('sliders.delete');
	});

	Route::prefix('contacts')->group(function(){
		Route::get('/view','Backend\ContactController@view')->name('contacts.view');
		Route::get('/add','Backend\ContactController@add')->name('contacts.add');
		Route::post('/store','Backend\ContactController@store')->name('contacts.store');
		Route::get('/edit/{id}','Backend\ContactController@edit')->name('contacts.edit');
		Route::post('/update/{id}','Backend\ContactController@update')->name('contacts.update');
		Route::get('/delete/{id}','Backend\ContactController@delete')->name('contacts.delete');
	});

	Route::prefix('abouts')->group(function(){
		Route::get('/view','Backend\AboutController@view')->name('abouts.view');
		Route::get('/add','Backend\AboutController@add')->name('abouts.add');
		Route::post('/store','Backend\AboutController@store')->name('abouts.store');
		Route::get('/edit/{id}','Backend\AboutController@edit')->name('abouts.edit');
		Route::post('/update/{id}','Backend\AboutController@update')->name('abouts.update');
		Route::get('/delete/{id}','Backend\AboutController@delete')->name('abouts.delete');
	});

	Route::prefix('news')->group(function(){
		Route::get('/view','Backend\NewController@view')->name('news.view');
		Route::get('/add','Backend\NewController@add')->name('news.add');
		Route::post('/store','Backend\NewController@store')->name('news.store');
		Route::get('/edit/{id}','Backend\NewController@edit')->name('news.edit');
		Route::post('/update/{id}','Backend\NewController@update')->name('news.update');
		Route::get('/delete/{id}','Backend\NewController@delete')->name('news.delete');
	});

	Route::prefix('categories')->group(function(){
		Route::get('/view','Backend\CategoryController@view')->name('categories.view');
		Route::get('/add','Backend\CategoryController@add')->name('categories.add');
		Route::post('/store','Backend\CategoryController@store')->name('categories.store');
		Route::get('/edit/{id}','Backend\CategoryController@edit')->name('categories.edit');
		Route::post('/update/{id}','Backend\CategoryController@update')->name('categories.update');
		Route::get('/delete/{id}','Backend\CategoryController@delete')->name('categories.delete');

	});
	Route::prefix('brands')->group(function(){
		Route::get('/view','Backend\BrandController@view')->name('brands.view');
		Route::get('/add','Backend\BrandController@add')->name('brands.add');
		Route::post('/store','Backend\BrandController@store')->name('brands.store');
		Route::get('/edit/{id}','Backend\BrandController@edit')->name('brands.edit');
		Route::post('/update/{id}','Backend\BrandController@update')->name('brands.update');
		Route::get('/delete/{id}','Backend\BrandController@delete')->name('brands.delete');
	});
	Route::prefix('colors')->group(function(){
		Route::get('/view','Backend\ColorController@view')->name('colors.view');
		Route::get('/add','Backend\ColorController@add')->name('colors.add');
		Route::post('/store','Backend\ColorController@store')->name('colors.store');
		Route::get('/edit/{id}','Backend\ColorController@edit')->name('colors.edit');
		Route::post('/update/{id}','Backend\ColorController@update')->name('colors.update');
		Route::get('/delete/{id}','Backend\ColorController@delete')->name('colors.delete');
	});
	Route::prefix('sizes')->group(function(){
		Route::get('/view','Backend\SizeController@view')->name('sizes.view');
		Route::get('/add','Backend\SizeController@add')->name('sizes.add');
		Route::post('/store','Backend\SizeController@store')->name('sizes.store');
		Route::get('/edit/{id}','Backend\SizeController@edit')->name('sizes.edit');
		Route::post('/update/{id}','Backend\SizeController@update')->name('sizes.update');
		Route::get('/delete/{id}','Backend\SizeController@delete')->name('sizes.delete');
	});

	Route::prefix('sponsors')->group(function(){
		Route::get('/view','Backend\SponsorController@view')->name('sponsors.view');
		Route::get('/add','Backend\SponsorController@add')->name('sponsors.add');
		Route::post('/store','Backend\SponsorController@store')->name('sponsors.store');
		Route::get('/edit/{id}','Backend\SponsorController@edit')->name('sponsors.edit');
		Route::post('/update/{id}','Backend\SponsorController@update')->name('sponsors.update');
		Route::get('/delete/{id}','Backend\SponsorController@delete')->name('sponsors.delete');
	});

	Route::prefix('products')->group(function(){
		Route::get('/view','Backend\ProductController@view')->name('products.view');
		Route::get('/add','Backend\ProductController@add')->name('products.add');
		Route::post('/store','Backend\ProductController@store')->name('products.store');
		Route::get('/edit/{id}','Backend\ProductController@edit')->name('products.edit');
		Route::post('/update/{id}','Backend\ProductController@update')->name('products.update');
		Route::get('/delete/{id}','Backend\ProductController@delete')->name('products.delete');
		Route::get('/details/{id}','Backend\ProductController@details')->name('products.details');
	});

	Route::prefix('customers')->group(function(){
		Route::get('/view','Backend\CustomerController@view')->name('customers.view');
		Route::get('/draft/view','Backend\CustomerController@draftView')->name('customers.draft.view');
		Route::get('/delete/{id}','Backend\CustomerController@delete')->name('customers.delete');
	});

	Route::prefix('orders')->group(function(){
		Route::get('/pending/list','Backend\OrderController@pendingList')->name('orders.pending.list');
		Route::get('/approved/list','Backend\OrderController@approvedList')->name('orders.approved.list');	
		Route::get('/details/{id}','Backend\OrderController@details')->name('orders.details');
		Route::get('/approve/{id}','Backend\OrderController@approve')->name('orders.approve');
	});	
});

