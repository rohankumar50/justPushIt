<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user=User::findOrFail($id);
        $follows=(auth()->user())?auth()->user()->following->contains($user->id):false;
        return view('profile.index',compact('user','follows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $this->authorize('update',$user->profile);
        return view('profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
        $user=User::findOrFail($id);
        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',
        ]);
        

        if(request('image')){
            $imagePath = request('image')->store('profile','public');
            $image=Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
            $image->save();

            $imageArray = ['image'=>$imagePath];
        }

        auth()->user()->profile->update(array_merge($data,$imageArray??[]));

        return redirect('/profile/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
