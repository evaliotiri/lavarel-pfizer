<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User\StoreRequest;
use App\Http\Requests\User\User\UsersStoreRequest;
use App\Http\Requests\User\User\UsersUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    /**
     * Diplay the users
     *
     * @return JsonResponse response
     */
    public function index() {
        $users = UserResource::collection(User::all());
        $count = count($users);

        return response()->json(compact('users', 'count'));
    }

    /**
     * Display a specified user
     *
     * @param User $user
     *
     * @return JsonResponse response
     */
    public function show(User $user) {
        $user = new UserResource($user);

        return response()->json(compact('user'),205);
    }

    /**
     * Stores a user
     *
     * @param UsersStoreRequest $request
     *
     * @return JsonResponse response
     */
    public function store(UsersStoreRequest $request){

        User::create($request->only('firstName', 'lastName', 'email', 'password'));

        return response()->json(compact('user'), 203);

    }

    /**
     * Updates a specific user
     *
     * @param UsersUpdateRequest $request
     * @param User $user
     *
     * @return JsonResponse response
     */
    public function update(User $user, UsersUpdateRequest $request) {

        $user->update($request->only('firstName', 'lastName', 'email'));

        return response()->json(null, 204);
    }

    /**
     * Deletes a specific user
     *
     * @param User $user
     *
     * @return JsonResponse
     * @throws Exception \mysql_xdevapi\Exception
     */
    public function destroy(User $user) {
        $user->delete();

        return response()->json('User deleted successfully!', 204);
    }

}
