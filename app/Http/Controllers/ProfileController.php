<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view(
            'profile.index',
            [
                'projects' => Project::all()
            ]
        );
    }

    public function update(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect()->route('profile.index')->with('status', 'Profile info has been updated');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        auth()->user()->update(
            [
                'password' => bcrypt($request->new_password)
            ]
        );

        return redirect()->route('profile.index')->with('status', 'Password changed.');
    }
}
