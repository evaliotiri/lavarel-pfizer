<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User\UsersSkillsUpdateRequest;
use App\Http\Requests\User\UsersSkillsStoreRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;

class UsersSkillsController extends Controller
{


    /**
     * Displays all the skills of the specified user
     *
     * @param User $user
     * @return JsonResponse response
     */
    public function index(User $user){
          print_r($user->skills);
          die();

        $skills = SkillResource::collection($user->skills);


        return response()->json(['skills' => $skills]);
    }

    /**
     * Stores a list with ids passing as argument in the request.
     *
     * @param User $user
     * @param UsersSkillsStoreRequest $request
     * @return JsonResponse
     */
    public function store(User $user, UsersSkillsStoreRequest $request){

        $user->skills()->sync($request->input('skills'));

        return response()->json('The specified users are stored!', 404);

    }

    /**
     * Updates the requested skill.
     *
     * @param User $user
     * @param Skill $skill
     * @param UsersSkillsUpdateRequest $request
     * @return string
     */
    public function update(User $user, Skill $skill, UsersSkillsUpdateRequest $request){

        $user->skills()->update($request->only('title'));

        return response()->json('The specified skill updated!', 404);

    }

    /**
     * Destroys the specified user
     *
     * @param User $user
     * @param Skill $skill
     * @return JsonResponse
     * @throws Exception exception
     */
    public function destroy(User $user, Skill $skill){

        $skill->delete();

        return response()->json('The skill deleted!',206);

    }
}
