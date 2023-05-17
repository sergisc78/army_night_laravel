<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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



Route::get('/',[AdminController::class,'index']);


// ADMIN ROUTES

Route::get('/admin',[AdminController::class,'redirect']);

/******************************************* BANDS ***********************************************/

/* SHOW BANDS */

Route::get('/admin/bands',[AdminController::class,'show']);

/* ADD BAND */

Route::get('/admin/add-band',[AdminController::class,'add']);

Route::post('/admin/saveBand',[AdminController::class,'addBand']);

/* DELETE BAND */

Route::get('/admin/bands/{id}',[AdminController::class,'deleteBand']);

/* EDIT BAND */

Route::get('/admin/bands/edit-band/{id}',[AdminController::class,'editBand']);

Route::post('/admin/bands/save-edit-band/{id}',[AdminController::class,'saveEditBand']);


/******************************************* GENRES ***********************************************/

/* SHOW GENRES */

Route::get('/admin/genres',[AdminController::class,'getGenres']);

/* ADD GENRE */

Route::get('/admin/add-genre',[AdminController::class,'addGenreForm']);

Route::post('/admin/saveGenre',[AdminController::class,'addGenre']);

/* DELETE BAND */

Route::get('/admin/genres/{id}',[AdminController::class,'deleteGenre']);

/* EDIT BAND */

Route::get('/admin/genres/edit-genre/{id}',[AdminController::class,'editGenre']);

Route::post('/admin/bands/save-edit-genre/{id}',[AdminController::class,'saveEditGenre']);


/******************************************* USERS ***********************************************/


/* SHOW USERS */

Route::get('/admin/users',[AdminController::class,'getUsers']);

/* EDIT USERS */

Route::get('/admin/users/edit-user/{id}',[AdminController::class,'editUser']);

Route::post('/admin/users/save-edit-user/{id}',[AdminController::class,'saveEditUser']);

/* DELETE USERS */

Route::get('/admin/users/{id}',[AdminController::class,'deleteUser']);


/******************************************* REVIEWS ***********************************************/

/* SHOW REVIEWS */

Route::get('/admin/reviews',[AdminController::class,'getReviews']);

/* ADD REVIEW */

Route::get('/admin/reviews/add-review',[AdminController::class,'addReviewForm']);

Route::post('/admin/saveReview',[AdminController::class,'addReview']);

/* VIEW REVIEW */

Route::get('/admin/reviews/view-review/{id}',[AdminController::class,'viewReview']);

/* EDIT REVIEW */

Route::get('/admin/reviews/edit-review/{id}',[AdminController::class,'editReview']);

Route::post('/admin/reviews/save-edit-user/{id}',[AdminController::class,'saveEditReview']);





//MIDDLEWARE
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
