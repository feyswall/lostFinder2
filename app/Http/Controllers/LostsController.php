<?php
namespace App\Http\Controllers;

use App\Models\Lost;
use Illuminate\Http\Request;
use App\Models\LostCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;
use App\Models\LostInfoDetail;


class LostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $losts = Lost::all();

        $losts = Lost::select('*')->with('lost_category')->get();
        $lostCategories = LostCategory::select('name', 'id')->get();

        return view('user/lost/all_losts', [
            'losts' => $losts,
            'lostCategories' => $lostCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = LostCategory::all();

        return view('user/lost/register_lost', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($exception instanceof \Illuminate\Http\Exceptions\PostTooLargeException) {
        //     return redirect()->back()->withErrors(['File size is too large']);
        // }

        $request->validate(
            [
                'title' => 'required|unique:losts,name',
                'description' => 'required',
                'lost_category' => 'required',
                'photo' => 'image|mimes:png,jpg,jpeg|max:20000',
                'audio' => 'max:50000',
            ]
        );

        $lost = Lost::create([
            'name' => $request->title,
            'desc' => $request->description,
            'user_id' => Auth::user() ? Auth::user()->id : 1,
            'lost_category_id' => $request->lost_category,
        ]);

        if( !$lost ){
            return redirect()->back()->withErrors(['lost_category' => 'No category found..!'])->withInput();
            $lost->delete();
        }

        if( $request->photo ){
            $file = $request->file('photo')->store('public/losts/image');
            $file = explode('/', $file);
            $file = end($file);
            LostInfoDetail::create([
                'lost_info_type' => 'image',
                'lost_info_item' => $file,
                'lost_id' => $lost->id,
            ]);
        }

        if( $request->audio ){
        $audio = $request->file('audio')->store('public/losts/audio');
            LostInfoDetail::create([
                'lost_info_type' => 'audio',
                'lost_info_item' => $audio,
                'lost_id' => $lost->id,
            ]);
        }


        return view('user/lost/single_lost',[ 'lost' => $lost ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lost  $lost
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {   

        $lost = Lost::find($id);
        if( !$lost ){
            return redirect()->back()->withErrors(['error' => 'The lost item was deleted!']);
        }
        // dd( $lost->lost_info_details[0]->lost_info_type );
        return view('user/lost/single_lost', [
            'lost' => $lost,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lost  $lost
     * @return \Illuminate\Http\Response
     */
    public function edit(Lost $lost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lost  $lost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lost $lost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lost  $lost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lost $lost)
    {
        //
    }
}
