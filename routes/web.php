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

Route::get('/co', function() {
  return view('c');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    return view('home');
});
//all-books
Route::get('all-books','BookController@all_book');
Auth::routes();

Route::get('/upload', ['uses'=>'UploadController@index','as'=>'upload','middleware'=>'roles','roles'=>['admin','user']]);
Route::post('/upload', ['uses'=>'UploadController@upload','as'=>'upload.save','middleware'=>'roles','roles'=>['admin','user']]);
// profile 
Route::get('/profile', ['uses'=>'ProfileController@index','as'=>'profile','middleware'=>'roles','roles'=>['admin','user']]);
//Account
Route::get('/profile/{name}', 'ProfileController@show');
//edit-information
Route::get('/editinformation/{username}', 'ProfileController@editform');
Route::post('/editinformation/{username}', 'ProfileController@edit');
//delete-book
Route::get('/delete/{id}', 'ProfileController@destroy');
//show category
Route::get('/category/{id}', 'AdminCategoryController@show')->name('showcategory');
//show book
Route::get('/book/{id}', 'BookController@show')->name('showbook');
//show user
Route::get('/info/{username}', 'ProfileController@showUser');
//upload request
Route::get('/admin/request', ['uses'=>'AdminUploaderController@index','as'=>'uploadrequest','middleware'=>'roles','roles'=>'admin']);
Route::get('/admin/assent/{id}', ['uses'=>'AdminUploaderController@assent','as'=>'assent','middleware'=>'roles','roles'=>'admin']);
//book-search
Route::get('/search/book/test', 'BookController@search');
//
Route::get('/search/book', 'BookController@find');
Route::post('/search/book', 'BookController@bookview')->name('searchresult');
//user-imag
Route::post('/change/pic/{username}','ProfileController@change_img');
Route::get('test',function (){
   return view('test');
});
//admin-routes
Route::group(['prefix'=>'admin','middleware'=>'roles','roles'=>'admin'],function()
{
Route::resource('users','AdminUsersController');
Route::resource('category','AdminCategoryController');
});