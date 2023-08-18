<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }


    /******************************************  GENRES SECTION **********************************/

    // SHOW GENRES   
    public function getGenres()
    {
        $genre = Genre::all();

        return view('admin.genre.genres', compact('genre'));
    }

    // SHOW ADD GENRE FORM  
    public function addGenreForm()
    {
        return view('admin.genre.add-genre');
    }

    // ADD A BAND FROM FORM
    public function addGenre(Request $request)
    {

        $genre = new Genre;

        $genre->genre_name = $request->genre_name;

        $genre->save();

        return redirect()->back()->with('message', 'Genre added successfully');
    }

    // SHOW DATA TO EDIT GENRE

    public function editGenre($id)
    {

        $genre = Genre::find($id);

        return view('admin.genre.edit-genre', compact('genre'));
    }

    // SAVE DATA 

    public function saveEditGenre(Request $request, $id)
    {

        $genre = Genre::find($id);

        $genre->genre_name = $request->genre_name;

        $genre->save();

        return redirect()->back()->with('message', 'Genre updated successfully');
    }

    //DELETE GENRE BY ID

    public function deleteGenre($id)
    {

        Genre::find($id)->delete();

        return back();
    }


    /******************************************  BANDS SECTION **********************************/


    // SHOW ALL BANDS
    function getBands()
    {

        $band = Band::all();

        return view('admin.band.bands', compact('band'));
    }

    //SHOW ADD BAND FORM
    function addBandForm()
    {

        return view('admin.band.add-band');
    }

    // SAVE BAND
    function addBand(Request $request)
    {

        $band = new Band();

        // ADD BAND IMAGE
        $image = $request->band_image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->band_image->move('bandImages', $imageName);
        $band->band_image = $imageName;

        // ADD BAND DATA
        $band->band_name = $request->band_name;
        $band->band_country = $request->band_country;
        $band->band_year_creation = $request->band_year_creation;

        $band->save();

        return redirect()->back()->with('message', 'Band added successfully');
    }

    public function editBand($id)
    {

        $band = Band::find($id);

        return view('admin.band.edit-band', compact('band'));
    }

    public function saveEditBand(Request $request, $id)
    {

        $band = Band::find($id);

        $band->band_name = $request->band_name;
        $band->band_country = $request->band_country;
        $band->band_year_creation = $request->band_year_creation;

        // IF THERE IS A NEW IMAGE,IT WILL BE UPDATED
        $image = $request->band_image;
        if ($image) {

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->band_image->move('bandImages', $imageName);
            $band->band_image = $imageName;
        }

        $band->save();
        return redirect()->back()->with('message', 'Band updated successfully');
    }

    public function deleteBand($id)
    {

        Band::find($id)->delete();

        return redirect()->back();
    }

    /******************************************  REVIEWS SECTION **********************************/


    // SHOW ALL REVIEWS

    public function getReviews()
    {
        $review = DB::table('reviews')
            ->join('genres', 'genres.id', '=', 'reviews.genre_id')
            ->join('bands', 'bands.id', '=', 'reviews.band_id')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*', 'genres.genre_name', 'bands.band_name', 'users.name')
            ->get();

        return view('admin.review.reviews', compact('review'));
    }


    // LOAD SELECT DATA FROM DATABASE AND SHOW FORM

    public function addReviewForm()
    {

        $band = Band::all();
        $genre = Genre::all();
        $user = User::all();
        return view('admin.review.add-review', compact('band', 'genre', 'user'));
    }

    //  SAVE NEW REVIEW
    
    public function addReview(Request $request)
    {

        $review = new Review();

        $review->genre_id = $request->genre_name;
        $review->band_id = $request->band_name;
        $review->user_id = $request->user_id;
        $review->album_title = $request->album_title;

        //ADD IMAGE

        $image = $request->album_image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->album_image->move('albumImages', $imageName);
        $review->album_image = $imageName;

        $review->album_year = $request->album_year;
        $review->album_link = $request->album_link;
        $review->album_review = $request->album_review;

        $review->save();

        return redirect()->back()->with('message', 'Review added successfully');
    }


    // READ REVIEW

    public function viewReview($id)
    {
        $review = DB::table('reviews')
            ->join('genres', 'genres.id', '=', 'reviews.genre_id')
            ->join('bands', 'bands.id', '=', 'reviews.band_id')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*', 'genres.genre_name', 'bands.band_name', 'users.name')
            ->where('reviews.id', $id)
            ->get();

        return view('admin.review.view-review', compact('review'));
    }

    //SHOW REVIEW DATA

    public function editReview($id)
    {

        $review = Review::find($id);
        $band = Band::all();
        $genre = Genre::all();
        $user=User::all();
        return view('admin.review.edit-review', compact('review', 'band', 'genre', 'user'));
    }


    // SAVE UPDATE

    public function saveEditReview(Request $request,$id){

        $review=Review::find($id);
        
        $review->album_title = $request->album_title;

        $review->genre_id = $request->genre_name;

        $review->band_id = $request->band_name;

        $review->user_id=$request->user_id;

        $review->album_year = $request->album_year;

        $review->album_link = $request->album_link;

        $review->album_review = $request->album_review;

        // IF THERE IS A NEW IMAGE,UPDATE IT 

        $image = $request->album_image;
        if ($image) {

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->album_image->move('albumImages', $imageName);
            $review->album_image = $imageName;
        }


        $review->save();


        return redirect()->back()->with('message', 'Review updated successfully');
    }


    //DELETE REVIEW

    public function deleteReview($id){

        Review::find($id)->delete();

        return redirect()->back();
    }
}
