<?php
/* ------- cart ---------- */
Route::get('cart', 'dmw@cart');
Route::post('cart', 'dmw@cart');
Route::get('cart/remove/(:all)', 'dmw@cart_remove');
Route::get('checkout', 'dmw@checkout');
Route::post('checkout', 'dmw@checkout');

/* ----------------  general DMW routes ------------- */
Route::get('/', 'dmw@index');
Route::get('home', 'dmw@index');
Route::get('faq', 'dmw@faq');
Route::get('how-to-buy', 'dmw@how_to_buy');
Route::get('about-philosophy', 'dmw@about_philosophy');
Route::get('about-people', 'dmw@about_people');
Route::get('about-brands', 'dmw@our_brands');
Route::get('contact', 'dmw@contact');
Route::post('contact', 'dmw@contact'); //array(/*'before'=>'csrf',*/ 'dmw@contact'));
Route::get('switch-language/(:any)/page/(:all)', array('as'=>'switch-language', 'uses'=>'dmw@switch_language'));

/* ----------------  amps routes ------------- */
Route::get('amps', 'dmw@amps');
/* ----------------  effects routes ------------- */
Route::get('effects', 'dmw@effects');
/* ----------------  Accessories routes ------------- */
Route::get('cases', 'dmw@cases');
Route::get('straps', 'dmw@straps');
/* ----------------  videos routes ------------- */
Route::get('videos', 'dmw@videos');

/* ----------------  guitar routes ------------- */
// Admin: create a guitar
Route::get('guitars/new', array('as'=>'create_guitar', 'uses'=>'guitars@new'));
Route::post('guitars/new', array(/*'before'=>'csrf',*/ 'uses'=>'guitars@new'));
// Admin: edit a guitar
Route::get('guitars/(:all)/edit', array('as'=>'edit_guitar', 'uses'=>'guitars@edit'));
Route::put('guitars/update', array(/*'before'=>'csrf',*/ 'uses'=>'guitars@update'));
// Admin: delete a guitar
Route::get('guitars/(:all)/delete', array('as'=>'delete_guitar', 'uses'=>'guitars@destroy'));
// display all guitars
Route::get('guitars',  array('as'=>'guitars', 'uses'=>'guitars@index'));
// view a specific guitar
Route::get('guitars/(:all)', array('as'=>'guitar', 'uses'=>'guitars@show'));

/* ----------------  bass routes ------------- */
// Admin: create a bass
Route::get('basses/new', array('as'=>'create_bass', 'uses'=>'basses@new'));
Route::post('basses/new', array(/*'before'=>'csrf',*/ 'uses'=>'basses@new'));
// Admin: edit a bass
Route::get('basses/(:all)/edit', array('as'=>'edit_bass', 'uses'=>'basses@edit'));
Route::put('basses/update', array(/*'before'=>'csrf',*/ 'uses'=>'basses@update'));
// Admin: delete a bass
Route::get('basses/(:all)/delete', array('as'=>'delete_bass', 'uses'=>'basses@destroy'));
// display all basses
Route::get('basses',  array('as'=>'basses', 'uses'=>'basses@index'));
// view a specific bass
Route::get('basses/(:all)', array('as'=>'bass', 'uses'=>'basses@show'));

/* ----------------  parts routes ------------- */
// display all parts
Route::get('parts', array('as'=>'parts', 'uses'=>'parts@index'));
// view a specific part
Route::get('parts/(:all)', array('as'=>'part', 'uses'=>'parts@show'));

Route::get('bodies', array('as'=>'bodies', 'uses'=>'parts@bodies'));
Route::get('fixed-bridges', array('as'=>'fixed-bridges', 'uses'=>'parts@fixed_bridges'));
Route::get('vibrato-bridges', array('as'=>'vib-bridges', 'uses'=>'parts@vib_bridges'));
Route::get('hardware', array('as'=>'hardware', 'uses'=>'parts@hardware'));
Route::get('machine-heads', array('as'=>'machine-heads', 'uses'=>'parts@machine_heads'));
Route::get('necks', array('as'=>'necks', 'uses'=>'parts@necks'));
Route::get('pickguards', array('as'=>'pickguards', 'uses'=>'parts@pickguards'));
Route::get('pickups', array('as'=>'pickups', 'uses'=>'parts@pickups'));
Route::get('electronics', array('as'=>'electronics', 'uses'=>'parts@electronics'));
Route::get('accessories', array('as'=>'accessories', 'uses'=>'parts@accessories'));

Route::post('add-to-cart', 'parts@add_to_cart');

/* --------------- errors -------------- */
Route::get('error', array('as'=>'error', 'uses' => 'errors@error'));

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});