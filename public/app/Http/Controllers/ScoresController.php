<?php

namespace App\Http\Controllers;

use App\Models\Score;
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

        if ($score->saveWithUser($request->username)) {
            return response()->json($score->getArrayView(), 200);
        } else {
            return response()->json([
                'code' => 500,
                'message' => 'Internal Server Error'
            ], 500);
        }
    }
}
