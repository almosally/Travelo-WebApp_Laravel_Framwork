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
/*
Route::get('/', function () {
    return view('welcome');

});


Route::get('/info', function () {
    return "<h1>this web3 application test made by kheir</h1>";

});
route::get ('/about',function(){
    return view('pages.about');
});

//insert dynamic value
route::get ('/users/{id}',function($id){
    return 'this is user'.$id;
});
*/

Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');

Route::get('/articles','PagesController@articles');
//for function we need crud
route::resource('posts','PostsController');



//route::get ('/about',function(){
  //  return view('pages.about');
//});
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
