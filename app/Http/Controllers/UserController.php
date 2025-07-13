<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(User::class);
    }

    public function index()
    {
        return ResourcesUser::collection(User::all());
    }

    public function store(StoreUserRequest $request)
    {
        $request->validated();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return ResourcesUser::make($user);
    }

    public function show(User $user)
    {
        return ResourcesUser::make($user);
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['msg' => 'Delete user'], 200);
    }
}
