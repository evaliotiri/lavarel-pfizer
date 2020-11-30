<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class DepartmentsManagersController extends Controller
{

    /**
     * Shows the manager of the department.
     *
     * @param Department $department
     * @param User $manager
     * @return JsonResponse
     */
    public function show(Department $department, User $manager){

        return response()->json($department->manager()->get(), 205);
    }

    /**
     * Associate a department with a user
     *
     * @param Department $department
     * @param User       $manager
     *
     * @return JsonResponse
     */
    public function update(Department $department, User $manager) {

        $department->manager()->associate($manager);
        $department->save();

        return response()->json('The manager is updated!', 205);
    }

    /**
     * Disassociate a department from a user
     *
     * @param Department $department
     * @param User  $user
     *
     * @return JsonResponse
     */
    public function destroy(Department $department, User $manager) {

        $department->manager()->disassociate();
        $department->save();

        return response()->json('The manager is deleted!', 205);
    }
}
