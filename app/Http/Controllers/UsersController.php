<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $data; // to be removed, not good approach
    // get the index
   public function index(){

//    $users = ['Evangelia', 'Christos', 'Vasilios'];
//    $count = count($users);
//       return compact('users', 'count');
// eager loading--Nice topic
       $this->data["users"] = User::all();
       $this->data["nusers"] = $this->data["users"]->count();


       return respone()->json($this->data);

       //json(['users' => $users, 'nUsers', $users->count()]);
   }

   public function show($id){
       $this->data["users"] = User::FindOrFail($id);
       return response()->json($this->data);
   }



}
