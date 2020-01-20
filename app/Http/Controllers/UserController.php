<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserReq;
use App\Http\Requests\UpdateUserReq;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

    }

    public function show()
    {

    }

    public function store(StoreUserReq $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->noContent();
    }

    public function update(UpdateUserReq $request, User $user)
    {
        if($request->has('name')) {
            $user->update(['name' => $request->input('name')]);
        }

        if($request->has('email')) {
            $user->update(['email' => $request->input('email')]);
        }

        if($request->has('password')) {
            $user->update(['password' => $request->input('password')]);
        }

        $user->save();

        return response()->noContent();
    }
}
