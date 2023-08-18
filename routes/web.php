<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// USER ROUTES

   Route::get('/user/home', [UserController::class, 'index'])->name('user.home');



// ADMIN ROUTES

Route::middleware(['auth', 'user_role'])->group(function () {
   Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');

   // GENRES
   Route::get('/admin/genres', [AdminController::class, 'getGenres'])->name('admin.genres');
   Route::get('/admin/genres/add-genre', [AdminController::class, 'addGenreForm'])->name('admin.add-genre');
   Route::post('/admin/genres/saveGenre', [AdminController::class, 'addGenre']);
   Route::get('/admin/genres/edit-genre/{id}', [AdminController::class, 'editGenre'])->name('admin.edit-genre');
   Route::post('/admin/genres/save-edit-genre/{id}', [AdminController::class, 'saveEditGenre']);
   Route::get('/admin/genres/{id}', [AdminController::class, 'deleteGenre']);

   // BANDS
   Route::get('/admin/bands', [AdminController::class, 'getBands'])->name('admin.bands');
   Route::get('/admin/bands/add-band', [AdminController::class, 'addBandForm'])->name('admin.add-band');
   Route::post('/admin/bands/saveBand', [AdminController::class, 'addBand']);
   Route::get('/admin/bands/edit-band/{id}', [AdminController::class, 'editBand'])->name('admin.edit-band');
   Route::post('/admin/bands/save-edit-band/{id}', [AdminController::class, 'saveEditBand']);
   Route::get('/admin/bands/{id}', [AdminController::class, 'deleteBand']);

   //REVIEWS
   Route::get('/admin/reviews', [AdminController::class, 'getReviews'])->name('admin.reviews');
   Route::get('/admin/reviews/add-review', [AdminController::class, 'addReviewForm'])->name('admin.add-review');
   Route::post('/admin/reviews/saveReview', [AdminController::class, 'addReview']);
   Route::get('/admin/reviews/view-review/{id}',[AdminController::class, 'viewReview'])->name('admin.view-review');
   Route::get('/admin/reviews/edit-review/{id}',[AdminController::class, 'editReview'])->name('admin.edit-review');
   Route::post('/admin/reviews/save-edit-review/{id}', [AdminController::class, 'saveEditReview']);
   Route::get('/admin/reviews/{id}', [AdminController::class, 'deleteReview']);
   

});


