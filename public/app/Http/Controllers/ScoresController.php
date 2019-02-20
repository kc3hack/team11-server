<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScoreResource;
use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    /**
     * GETリクエストを処理するメソッドです。
     *
     * @param Request $request
     * @return mixed
     */
    public function get(Request $request)
    {
        return ScoreResource::collection(
            Score::where(['user_type' => $request->query('user_type')])
                ->orderByDesc('value')
                ->paginate(15)
        );
    }

    /**
     * POSTリクエストを処理するメソッドです。
     *
     * @param Request $request
     * @return mixed
     */
    public function post(Request $request)
    {
        $score = new Score();
        $score->value = $request->value;
        $score->username = $request->username;
        $score->user_type = $request->user_type;

        if ($score->save()) {
            return response()->json($score->getArrayView(), 200);
        } else {
            return response()->json([
                'code' => 500,
                'message' => 'Internal Server Error'
            ], 500);
        }
    }
}
