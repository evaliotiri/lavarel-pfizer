<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersSkillsController extends Controller
{
    public function index($id){
        $user = User::with('skills')->findOrFail($id);
        $skills = $user->skills;

        return response()->json([
            'skills' => $skills
            ]);
    }

    public function store(Request $request){


    }

    public function update(User $user){

    }

    public function destroy(User $user){

    }
}
