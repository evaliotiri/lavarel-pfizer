<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Department\DepartmentsUsersStoreRequest;
use App\Http\Requests\User\Department\DepartmentsUsersUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\Department;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;

class DepartmentsUsersController extends Controller
{
    /**
     * Display all the users of the department.
     *
     * @param Department $department given department
     * @return JsonResponse departments
     */
    public function index(Department $department){
        return response()->json($department->users()->get(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Department $department
     * @param User $user
     * @param DepartmentsUsersStoreRequest $request
     * @return JsonResponse response for the user
     */
    public function store(Department $department, User $user, DepartmentsUsersStoreRequest $request){
        $department->users()->create($request->only('firstName', 'lastName', 'email', 'password'));

        return response()->json('The user is added!', 205);
    }

    /**
     * Display s specific user from the department.
     *
     * @param Department $department
     * @param User $user
     * @return UserResource details of the user account
     */
    public function show(Department $department, User $user){

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Department $department
     * @param User $user
     * @param DepartmentsUsersUpdateRequest $request
     * @return JsonResponse response
     */
    public function update(Department $department, User $user, DepartmentsUsersUpdateRequest $request){
        $department->users()->update($request->only('firstName', 'lastName', 'email', 'password'));

        return response()->json('The user is updated!', 200);
    }

    /**
     * Remove the specified user from the department.
     *
     * @param User $user
     * @return JsonResponse response
     * @throws Exception exception in case of the user or the department do not exist
     */
    public function destroy(User $user){

        $user->delete();

        return response()->json('The user is deleted!', 200);

    }
}
