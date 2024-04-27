<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $profile = Profile::where('user_id','=',$id)->first();

        return view('user-profile.edit', ['title' => "Profile Edit",'profile' => $profile]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'address' => ['required','string'],
            'age' => ['required','numeric'],
            'bio' => ['nullable'],
        ]);

        Profile::where('id',$id)->update([
            'address' => $request->input('address'),
            'age' => $request->input('age'),
            'bio' => $request->input('bio'),
        ]);

        return redirect('/profile');
    }
}
