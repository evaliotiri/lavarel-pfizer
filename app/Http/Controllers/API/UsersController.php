<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();
        $count = count($users);

        return compact('users', 'count');
    }


    public function show($id){

        $current = User::findOrFail($id);
        return compact('current');
    }

    public function store(Request $request){

        $user = new User;
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response() -> json(compact('user'),201);
    }

    public function update(Request $request, User $user){
        $user->update($request->only('firstName', 'lastName', 'email'));
         // update the password via encrypted way
        return response()->json('User is updated'. $user ,200);
    }

    public function destroy(User $user){
        $user->delete();
        return response()->json('The user is deleted '. $user, 200);
    }
}
