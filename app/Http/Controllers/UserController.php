<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateSecurityRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('front.home');
    }

    public function profile()
    {
        $profile = Auth::user();
        return view('front.user.profile', compact('profile'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $sanitized = $request->getSanitized();

        $user = User::findOrFail(Auth::id());
        $user->update($sanitized);

        return back()->withSuccess('Profile berhasil di ubah');
    }

    public function updateSecurity(UpdateSecurityRequest $request)
    {
        $sanitized = $request->getModifiedData();

        $user = User::findOrFail(Auth::id());
        $user->update($sanitized);

        return back()->withSuccess('Password berhasil di ubah');
    }
}
