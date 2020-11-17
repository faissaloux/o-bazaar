<?php

use Illuminate\Support\Facades\Route;

Route::post('/resetpassword', 'WebsiteController@validatePasswordRequest')->name('password.validate');
Route::post('/password/reset', 'WebsiteController@resetPassword')->name('password.request');
Route::any('reset_password/{token}', 'WebsiteController@getPassword')->name('password.getPassword');

Route::post('couponcheck', 'PayementController@applyCoupon')->name('applyCoupon');

Route::post('/form/send', 'WebsiteController@contactsend')->name('contact.send');
Route::get('/contact-us', 'WebsiteController@contact')->name('contact');
Route::get('/about-us', 'WebsiteController@about')->name('about');
Route::get('/thank-you', 'WebsiteController@thankyou')->name('thank-you');    
Route::get('/contact/send', 'WebsiteController@contact-send')->name('contact.send');
Route::get('/faq', 'Theme2Controller@faq');

Route::get('/sendmail/{id}', 'WebsiteController@sendmail')->name('sendmail');

Route::get('/current/user', 'UsersController@current');

Route::POST('send/device_token', 'deviceTokenController@send')->name('ldldldldldledldldldlmdl');

Route::get('/sendAlert', 'AlertController@send');

Route::get('/printinvoice/{id}', 'WebsiteController@printinvoice')->name('invoice.print');
Route::get('/printinvoiceThermal/{id}', 'WebsiteController@printinvoiceThermal')->name('invoice.printThermal');

Route::get('/loadcartAgain/{store}', 'WebsiteController@loadcartHTML');

Route::get('/join', 'WebsiteController@join')->name('join');

/*
|--------------------------------------------------------------------------
| website Routes
|--------------------------------------------------------------------------
|  
*/
Route::get('/', 'BaseController@index')->name('base');

Route::any('/duplicate/{id}', 'DuplicateController@jahnama')->name('store.duplicate');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/page/{slug}', 'WebsiteController@basepage')->name('basepage');

Route::get('/{page}', 'WebsiteController@websitepage')->name('website.page');


Route::group(['prefix' => '{store}', 'as' => 'store.', 'middleware' => 'store' ], function ($store) {

    Route::get('/quickview/{id}', 'ShopController@quickview')->name('quickview');

    Route::get('/', 'WebsiteController@home')->name('home');
    
    Route::post('/subscribe', 'NewsLetterController@subscribe')->name('subscribe');


    Route::get('/shop', 'ShopController@index')->name('shop');

    Route::get('/category/{slug}', 'ShopController@category')->name('shop.category');

    Route::get('/shop/product/{id}', 'ShopController@product')->name('shop.product');

    Route::get('/shipping/add', 'WebsiteController@shipping_add')->name('shipping.add');

    Route::get('/shipping/set/{id}', 'WebsiteController@shipping_set')->name('shipping.set');

    Route::post('/shipping/add', 'WebsiteController@shipping_store')->name('shipping.add');


    Route::get('/shipping/edit/{id}', 'ProfileController@edit_shipping')->name('shipping.edit')->middleware(['user']);

    Route::post('/shipping/update/{id}', 'ProfileController@update_shipping')->name('shipping.update')->middleware(['user']);

    Route::get('/shipping/delete/{id}', 'ProfileController@shipping_delete')->name('shipping.delete')->middleware(['user']);

    Route::get('/shipping/default/{id}', 'ProfileController@shipping_default')->name('shipping.default')->middleware(['user']);

    Route::get('/payement/methode', 'PagesController@pmethode')->name('pmethode');


    Route::get('/terms', 'WebsiteController@terms')->name('terms');

    Route::get('/faqs', 'WebsiteController@faqs')->name('faqs');

    Route::get('/favorites', 'WebsiteController@favorites')->name('favorites');

    Route::get('/wishlist', 'WebsiteController@wishlist')->name('wishlist')->middleware(['user']);

    Route::get('/checkout', 'WebsiteController@checkout')->name('checkout');

    Route::get('/account/login', 'WebsiteController@user')->name('user');

    Route::get('/register', 'WebsiteController@register')->name('register');

    Route::post('/registration', 'WebsiteController@registration')->name('registration');

    Route::post('/account/login', 'WebsiteController@userAuth')->name('auth-user');

    Route::get('/account', 'ProfileController@edit')->name('edit')->middleware(['user']);

    Route::post('/account/update', 'ProfileController@update')->name('update')->middleware(['user']);

    Route::get('/account/forgot', 'WebsiteController@forgot')->name('forgot');

    Route::get('/account/info', 'WebsiteController@info')->name('info')->middleware(['user']);

    Route::get('/adresses', 'WebsiteController@adresses')->name('adresses')->middleware(['user']);

    Route::get('/account/password', 'ProfileController@password')->name('password')->middleware(['user']);

    Route::post('/account/password/update', 'ProfileController@passwordUpdate')->name('password-update')->middleware(['user']);

    Route::get('/search', 'WebsiteController@searchProccess')->name('search');

    Route::get('/blog', 'WebsiteController@blog')->name('blog');

    Route::get('/blog/search', 'WebsiteController@search_blog')->name('search_blog');

    Route::get('/categories', 'WebsiteController@categories')->name('categories');

    Route::get('/category/{slug}', 'WebsiteController@category')->name('category');

    Route::get('/reset', 'WebsiteController@reset')->name('reset');

    Route::get('/product', 'WebsiteController@product')->name('product');

    Route::get('/orders', 'WebsiteController@orders')->name('orders')->middleware(['user']);

    Route::get('/single', 'WebsiteController@single')->name('single');

    Route::get('/404', 'WebsiteController@erreur404')->name('404');

    Route::get('/category/{slug}', 'WebsiteController@category')->name('category');

    Route::post('/shop/pay', 'PayementController@checkout_pay')->name('checkout.pay');
    Route::any('/paypal/failed', 'PayPalController@failedPayement')->name('paypal.faild');
    Route::any('/paypal/success', 'PayPalController@successPayement')->name('paypal.success');


    // add,remove,update,clear the cart  - wishlist to cart
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::get('/cart/clear', 'CartController@clear')->name('cart_clear');
    Route::any('/cart/add/{id}', 'CartController@add')->name('cart.add');
    Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
    Route::post('/cart/update/', 'CartController@update')->name('cart.update');

    // add and remove product to wishlist
    Route::get('/wishlist/add/{id}', 'WishlistController@add')->name('wishlist.add');
    Route::get('/wishlist/remove/{id}', 'WishlistController@remove')->name('wishlist.remove');
    Route::post('/wishlist/to/checkout', 'WishlistController@checkout')->name('wishlist.checkout');
    Route::get('/wishlist/clear', 'WishlistController@clear')->name('wishlist.clear');

    // add and remove product to wishlist and add coupon
    Route::post('/product/{id}/rate', 'ProductsControlleru@add')->name('product.rate');
    Route::post('/product/{id}/report', 'WishlistController@remove')->name('product.report');
    Route::post('/wishlist/to/checkout', 'WishlistController@remove')->name('favorite.remove');
    Route::post('/coupon/activate/{id}', 'CouponsController@remove')->name('favorite.remove');

    Route::get('/{page}', 'WebsiteController@page')->name('page.view');

    Route::get('orders/details/{id}', 'WebsiteController@order_detail')->name('orders_detail');
});

Route::group(['prefix' => '/datenschutzerklarung', 'as' => 'datenschutzerklarung.' ], function () {
    Route::get('/', 'Theme2Controller@datenschutzerklarung');
    Route::get('/index', 'Theme2Controller@datenschutzerklarungIndex');
    Route::get('/kunden', 'Theme2Controller@datenschutzerklarungKunden');
    Route::get('/lieferanten/drittanbieter', 'Theme2Controller@datenschutzerklarungLieferanten');
});

Route::group(['prefix' => '/agb', 'as' => 'agb.' ], function () {
    Route::get('/', 'Theme2Controller@agb');
    Route::get('/kunden', 'Theme2Controller@agbKunden');
    Route::get('/lieferanten', 'Theme2Controller@agbLieferanten');
    Route::get('/lieferanten/Kunden', 'Theme2Controller@agbLieferantenKunden');
});