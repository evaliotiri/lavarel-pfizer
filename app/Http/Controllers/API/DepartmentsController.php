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

}
