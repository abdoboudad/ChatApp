<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('aboutCheck');
    }
    public function about(){
        return view('profile.details.register');
    }
    public function aboutsaved(Request $request){
        $request->validate([
            'photo'=>['required','file'],
            'about'=>['required','string','min:10'],
            'gender'=>['required','string','min:4','max:6'],
            'country'=>['required','string','min:2','max:6'],
        ]);
        $file = $request->file('photo');
        $path = $file->store('photo','files');
        Profile::create([
            'photo'=>$path,
            'about'=>$request->about,
            'gender'=>$request->gender,
            'country'=>$request->country,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect()->route('chat.show','welcome');
    }
}
