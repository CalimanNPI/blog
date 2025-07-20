<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

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

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string','email', 'max:255', 'unique:' . User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()]
        // ]);

   return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);


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

    public function update(UpdateUserRequest $request, User $user)
    {
        $request->validated();
        $user->name = $request->name;
        $user->name = $request->email;
        $user->save();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['msg' => 'Delete user'], 200);
    }

    //   public function updatePassword(Request $request)
    //   {
    //       $request->validate([
    //           'title' => ['required', 'unique:posts', 'max:255'],
    //           'body' => ['required'],
    //       ]);
    //   }

}
