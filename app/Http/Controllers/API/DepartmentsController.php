<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Department\DepartmentsStoreRequest;
use App\Http\Requests\User\Department\DepartmentsUpdateRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;

class DepartmentsController extends Controller
{
    /**
     * Display all the departments.
     *
     * @return JsonResponse response
     */
    public function index(){

        $departments = DepartmentResource::collection(Department::all());

        return response()->json(compact('departments'));
    }

    /**
     * Store a newly created department in storage.
     *
     * @param DepartmentsStoreRequest $request
     * @return JsonResponse response
     */
    public function store(DepartmentsStoreRequest $request){

        Department::create($request->only('title'));

        return response()->json('The department is stored!', 202);
    }

    /**
     * Display the specified department.
     *
     * @param Department $department
     * @return JsonResponse details of the specified department
     */
    public function show(Department $department){

        return response()->json(compact('department'), 202);
    }

    /**
     * Update the specified department in storage.
     *
     * @param Department $department
     * @param DepartmentsUpdateRequest $request
     * @return JsonResponse
     */
    public function update(Department $department, DepartmentsUpdateRequest $request){
           $department->update($request->only('title'));

           return response()->json('The department\'s details updated successfully!', 203);
    }

    /**
     * Remove the specified department from storage.
     *
     * @param Department $department
     * @return JsonResponse response
     * @throws Exception any \mysql_xdevapi\Exception
     */
    public function destroy(Department $department){

         $department->delete();

        return response()->json('The department deleted!', 208);
    }

    /**
     * Assigns the manager to a specified department. If the manager is previously assigned,
     * the user is informed.
     *
     * Improvement: Before the manager assignment, it could be safer to search if the current user is already assigned
     * as manager to another department. By doing this, the one-to-one relationship between
     * the user and department and its constraint will be maintained.
     *
     * @param Department $department department
     * @param User $user user
     * @return JsonResponse response
     */
    public function assignManager(Department $department, User $user){

        if ($department->manager()->exists()) {
            return response() -> json('This department has a manager!', 205);
        }else{
            $department->manager()->save($user);

            return response()->json('The manager is set!', 200);
        }
    }

}
