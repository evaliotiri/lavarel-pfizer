<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Department\DepartmentsUsersStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\Department;
use App\Models\User;
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
    public function update(Department $department, User $manager) {
        $department->manager()->associate($manager);
        $department->save();

        return response()->json("The manager is set to the department!", 204);
    }

    /**
     * Disassociate a department from a user
     *
     * @param Department $department
     * @param User       $user
     *
     * @return JsonResponse
     */
    public function destroy(Department $department, User $user) {
        $department->manager()->disassociate();
        $department->save();

        return response()->json('There is no manager for this department!', 204);
    }
}
