<?php
use App\http\Middleware\isAdmin;
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

//});

*/
Auth::routes();
Route::get('/', 'PagesController@index');
Route::resource('/posts', 'PostsController');
Route::get('/articles/{id}', 'PagesController@getPostsByCountry');
Route::get('/dashboard', 'DashboardController@index');

Route::get('/image/{image}', 'DashboardController@GetImage');
Route::get('/editProfile', 'UsersController@editProfile');
Route::put('/updateProfile', 'UsersController@updateProfile');
Route::get('/pdf/{id}', 'PagesController@getPdf');

Route::get('/export_excel', 'ExportExcelController@index');

Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');
Route::delete('/destroy/{id}','UsersController@destroy');

Route::resource('destroy','UsersController');
Route::get('/setadmin/{id}', 'UsersController@setadmin');

Route::group(['middleware'=>['web','auth']],function() {

    //for function we need crud
    Route::resource('adminpanel', 'PostsController');
    Route::get ('/adminpanel',function(){
        if(Auth::user()->admin==0){
            return redirect('/dashboard');
        }else{
            $users{'users'}=\App\user::all();
            $posts{'posts'}=\App\Post::all();

            return view('pages.adminpanel',$users,$posts);}});

    });

/*Route::group(['prefix'=>'admin','middleware'=>isAdmin::class],function(){
    Route::put('/', 'admin\PagesController@index');
    Route::resource('posts', 'admin\PostsController');
    Route::get('adminpanel', 'admin\DashboardController@index');

    Route::get('/apicall/posts','admin\PostsController@show');
});*/

