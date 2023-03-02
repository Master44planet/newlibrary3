<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FavouriteController;

Route::get('/books/all/{id}', 'App\Http\Controllers\BookController@ShowOneMessage')->name('books-data-one');
Route::get('/books/all/{id}/update', 'App\Http\Controllers\BookController@UpdateBook')->name('update-message');
Route::get('/books/all/{id}/delete', 'App\Http\Controllers\BookController@deleteMessage')->name('delete-message');
Route::post('/books/all/{id}/update', 'App\Http\Controllers\BookController@UpdateBookSubmit')->name('update-message-submit');
Route::get('/books/all', 'App\Http\Controllers\BookController@allData')->name('books-data');
Route::post('/books/submit', 'App\Http\Controllers\BookController@submit')->name('books-form');
Route::get('/books/export', 'App\Http\Controllers\BookController@export')->name('books-export');
Route::get('/books', function () {
    return view('books');
});

Route::middleware(['auth', 'can:2'])->group(function () {
    Route::get('/books/export', 'App\Http\Controllers\BookController@export')->name('books-export');
    Route::get('/books/all/{id}/update', 'App\Http\Controllers\BookController@UpdateBook')->name('update-message');
    Route::get('/books/all/{id}/delete', 'App\Http\Controllers\BookController@deleteMessage')->name('delete-message');
    Route::post('/books/all/{id}/update', 'App\Http\Controllers\BookController@UpdateBookSubmit')->name('update-message-submit');
    Route::post('/books/submit', 'App\Http\Controllers\BookController@submit')->name('books-form');


    Route::get('/books', function () {
        return view('books');
    });
    });

Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('/addfavourite', function () {
    return view('addfavourite');
})->name('addfavourite');
Route::get('/addfavourite/all', 'App\Http\Controllers\FavouriteController@allData1')->name('addfavourite-data');
Route::post('/addfavourite/submit', 'App\Http\Controllers\FavouriteController@submit')->name('addfavourite-form');
Route::delete('/addfavourite/destroy/{id}', 'App\Http\Controllers\FavouriteController@destroy')->name('favourite-destroy');

Route::middleware('auth')->group(function () {
    Route::get('/addfavourite', function () {
        return view('addfavourite');
    })->name('addfavourite');
    Route::get('/addfavourite/all', 'App\Http\Controllers\FavouriteController@allData1')->name('addfavourite-data');
    Route::post('/addfavourite/submit', 'App\Http\Controllers\FavouriteController@submit')->name('addfavourite-form');
    Route::delete('/addfavourite/destroy/{id}', 'App\Http\Controllers\FavouriteController@destroy')->name('favourite-destroy');
    });

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');