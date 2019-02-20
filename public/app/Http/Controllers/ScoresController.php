<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function post(Request $request)
    {
        $score = new Score();
        $score->value = $request->value;

        $user = new User();
        $user->name = $request->username;
        $user->is_admin = $request->query('user_type');

        if ($score->saveWithUser($user)) {
            return response()->json($score->getArrayView(), 200);
        } else {
            return response()->json([
                'code' => 500,
                'message' => 'Internal Server Error'
            ], 500);
        }
    }
}
