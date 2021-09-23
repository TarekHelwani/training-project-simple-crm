<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $withDeleted = null;

        if (in_array(request('deleted'), USER::FILTER) && request('deleted') === 'true') {
            $withDeleted = true;
        }

        $users = User::with('roles')->when(
            $withDeleted,
            function ($query) {
                $query->withTrashed();
            }
        )->paginate(20);

        return view('users.index', compact('users', 'withDeleted'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $user = User::create(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone_number' => $request->phone_number,
            ]
        );

        event(new Registered($user));

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(EditUserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
