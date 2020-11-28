<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Skill\SkillsStoreRequest;
use App\Http\Requests\User\Skill\SkillsUpdateRequest;
use App\Models\Skill;
use Exception;
use Illuminate\Http\JsonResponse;


class SkillsController extends Controller
{


    /**
     * Display all the stored skills
     *
     * @return array skills
     */
    public function index() {
        $skills = Skill::all();

        return compact('skills');
    }

    /**
     * Stores new skill.
     *
     * @param SkillsStoreRequest $request
     * @return JsonResponse contains the newly created skill and a status code
     */
    public function store(SkillsStoreRequest $request){

       $skill = Skill::create($request->only('title'));

       return response()->json(compact('skill'), 200);
    }

    /**
     * Updates the specified skill.
     *
     * @param Skill $skill
     * @param SkillsUpdateRequest $updateRequest
     * @return JsonResponse response
     */
    public function update(Skill $skill, SkillsUpdateRequest $updateRequest){

        $skill->update($updateRequest->only('title'));

        return response()->json("The skill updated!", 203);

    }

    /**
     * Destroys a specified skill.
     *
     * @param Skill $skill
     * @return JsonResponse response
     * @throws Exception exception
     */
    public function destroy(Skill $skill){

        $skill->delete();

        return response()->json('Deleted successfully!',200);
    }
}
