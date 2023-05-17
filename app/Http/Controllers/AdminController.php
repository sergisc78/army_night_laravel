<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Band;
use App\Models\Genre;
use App\Models\Review;
use Illuminate\Support\Facades\DB;


use Faker\Provider\Base;


class AdminController extends Controller
{
    //
    public function redirect()
    {

        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                return view('user.home');
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }



    public function index()
    {

        if (Auth::id()) {
            return view('admin.home');
        } else {


            return view('welcome');
        }
    }

    /******************************************  BANDS SECTION **********************************/

    // SHOW ALL BANDS IN DATABASE

    public function show()
    {

        $band = Band::all();
        return view('admin.bands', compact('band'));
    }

    public function add()
    {
        return view('admin.add-band');
    }

    // ADD A BAND FROM FORM

    public function addBand(Request $request)
    {


        // SAVE AN IMAGE

        $band = new band;
        //if($request->hasFile('band_image')){
        $image = $request->band_image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->band_image->move('bandImages', $imageName);
        $band->band_image = $imageName;

        //}

        // SAVE OTHER DATA

        $band->band_name = $request->band_name;
        $band->band_country = $request->band_country;
        $band->band_year_creation = $request->band_year_creation;

        $band->save();

        return redirect()->back()->with('message', 'Band added successfully');
    }

    //SHOW BAND DATA TO UPDATE

    public function editBand($id)
    {

        $band = Band::find($id);

        return view('admin.edit-band', compact('band'));
    }

    // SAVE UPDATE

    public function saveEditBand(Request $request, $id)
    {

        $band = Band::find($id);


        // SAVE BAND DATA
        $band->band_name = $request->band_name;
        $band->band_country = $request->band_country;
        $band->band_year_creation = $request->band_year_creation;


        // IF THERE IS A NEW IMAGE,UPDATE IT 
        $image = $request->band_image;
        if ($image) {

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->band_image->move('bandImages', $imageName);
            $band->band_image = $imageName;
        }

        $band->save();
        return redirect()->back()->with('message', 'Band updated successfully');
    }

    // DELETE BAND BY ID

    public function deleteBand($id)
    {

        Band::find($id)->delete();
        return back();
    }

    /******************************************  GENRES SECTION **********************************/


    // SHOW GENRES 
    public function getGenres()
    {


        $genre = Genre::all();

        return view('admin.genres', compact('genre'));
    }

    public function addGenreForm()
    {
        return view('admin.add-genre');
    }

    // ADD A BAND FROM FORM
    public function addGenre(Request $request)
    {

        $genre = new Genre;

        $genre->genre_name = $request->genre_name;

        $genre->save();

        return redirect()->back()->with('message', 'Genre added successfully');
    }

    // SHOW DATA IN INPUTS TO EDIT

    public function editGenre($id)
    {

        $genre = Genre::find($id);

        return view('admin.edit-genre', compact('genre'));
    }

    // EDIT GENRE BY ID

    public function saveEditGenre(Request $request, $id)
    {

        $genre = Genre::find($id);

        $genre->genre_name = $request->genre_name;

        $genre->save();

        return back()->with('message', 'Genre updated successfully');
    }

    // DELETE GENRE BY ID

    public function deleteGenre($id)
    {


        Genre::find($id)->delete();
        return back();
    }


    /******************************************  USERS SECTION **********************************/


    // SHOW USERS

    public function getUsers()
    {


        $user = User::all();

        return view('admin.users', compact('user'));
    }

    // SHOW DATA USER IN INPUTS

    public function editUser($id)
    {

        $user = User::find($id);

        return view('admin.edit-user', compact('user'));
    }

    // EDIT USER BY ID

    public function saveEditUser(Request $request, $id)
    {

        $user = User::find($id);

        $user->name = $request->name;

        $user->email = $request->email;

        $user->usertype = $request->usertype;

        $user->save();

        return back()->with('message', 'User updated successfully');
    }

    public function deleteUser($id)
    {


        User::find($id)->delete();

        return back();
    }

    /******************************************  REVIEWS SECTION **********************************/

    public function getReviews()
    {

        $review= DB::table('reviews')
        ->join('genres','genres.id','=','reviews.genre_id')
        ->join('bands','bands.id','=','reviews.band_id')
        ->select('reviews.*','genres.genre_name','bands.band_name')
        ->get();
        
        return view('admin.reviews',compact('review'));
    }

    public function addReviewForm()
    
    {

        $band=Band::all();
        $genre=Genre::all();
        return view('admin.add-review',compact('band', 'genre'));
    }

    public function addReview(Request $request){

        $review=new Review();
        
        
        $review->genre_id=$request->genre_name;
        $review->band_id=$request->band_name;
        $review->album_title = $request->album_title;

        //ADD IMAGE

        $image = $request->album_image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->album_image->move('albumImages', $imageName);
        $review->album_image = $imageName;

        
        $review->album_year=$request->album_year;
        $review->album_link=$request->album_link;
        $review->album_review=$request->album_review;

        
        
        $review->save();
        

        return redirect()->back()->with('message', 'Review added successfully');


    }

    public function viewReview($id){

        

        $review= DB::table('reviews')
        ->join('genres','genres.id','=','reviews.genre_id')
        ->join('bands','bands.id','=','reviews.band_id')
        ->select('reviews.*','genres.genre_name','bands.band_name')
        ->where('reviews.id', $id)
        ->get();
        
       

        return view ('admin.view-review',compact('review'));
    }

    public function editReview($id){

        

        $review= DB::table('reviews')
        ->join('genres','genres.id','=','reviews.genre_id')
        ->join('bands','bands.id','=','reviews.band_id')
        ->select('reviews.*','genres.genre_name','bands.band_name')
        ->where('reviews.id', $id)
        ->get();
        
       

        return view ('admin.edit-review',compact('review'));
    }

    public function saveEditReview(Request $request,$id){

    }
}
