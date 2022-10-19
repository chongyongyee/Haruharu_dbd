<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.users.profile');
    }

    public function updateUserDetails(Request $request)
    {

        $request->validate([
            'username' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'postcode' => ['required', 'digits:5'],
            'address' => ['required', 'string', 'max:499'],
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->username
        ]);

        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'phone' => $request->phone,
                'address' => $request->address,
                'postcode' => $request->postcode,
            ]
        );

        return redirect()->back()->with('message', 'User Profile Updated');
    }
}
