<?php




Route::get('/', 'ProductController@getProducts')->name('product.index');
Route::get('/login', 'UserController@getLogin')->name('user.login-form');
Route::post('/login', 'UserController@login')->name('user.login');
Route::get('/register', 'UserController@getRegister')->name('user.register-form');
Route::post('/register', 'UserController@register')->name('user.register');
Route::get('/logout', 'UserController@logout')->name('user.logout');
Route::post('/add_to_cart/{product}', 'ProductController@addToCart')->name('cart.add');
Route::get('/cart-detail', 'ProductController@getShoppingCart')->name('product.cart');
Route::delete('/cart/delete', 'ProductController@cartDelete')->name('cart.delete');
Route::get('/checkout', 'ProductController@getCheckout')->name('checkout');