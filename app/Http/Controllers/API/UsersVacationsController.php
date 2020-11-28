<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UsersVacationsStoreRequest;
use App\Http\Requests\User\UsersVacationsUpdateRequest;
use App\Models\User;
use App\Models\Vacation;
use Exception;

use Illuminate\Http\JsonResponse;


class UsersVacationsController extends Controller
{
    /**
     * Display the vacations associated withe the user.
     *
     * @param User $user
     * @return JsonResponse array
     */
    public function index(User $user){
        return response()-> json($user->vacations()->get(), 203);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param User $user
     * @param Vacation $vacation
     * @param UsersVacationsStoreRequest $request
     * @return JsonResponse response
     */
    public function store(User $user, Vacation $vacation, UsersVacationsStoreRequest $request){

        $user->vacations()->create($request->only('to','from'));

        return response()->json("The vacation is stored!", 205);

    }

    /**
     * Displays the vacations of a specific user.
     *
     * @param User $user
     * @param Vacation $vacation
     * @return JsonResponse response
     */
    public function show(User $user, Vacation $vacation){
        return response()->json($user->vacations()->get(), 206);
    }

    /**
     * Updates the specified resource in storage.
     *
     * @param User $user
     * @param Vacation $vacation
     * @param  $request
     * @return JsonResponse response
     */
    public function update(User $user, Vacation $vacation, UsersVacationsUpdateRequest $request){
        $vacation->update($request->only('from', 'to'));

        return response()-> json(null, 204);
    }

    /**
     * Removed the specified vacation from the user.
     *
     * @param User $user
     * @param Vacation $vacation
     * @return JsonResponse response
     * @throws Exception in case of emerged problem with the deletion
     */
    public function destroy(User $user, Vacation $vacation){
        $vacation->delete();

        return response()-> json("The vacation was deleted successfully!", 204);

    }
}
