<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;

class LessonsController extends Controller
{
    public function index()
    {
        // 1. "all()" is bad.
        // 2. no way to attach meta data is bad
        // 3. linking db structure to API output is bad
        // 4. no way to signal headers/response codes is bad
        
        $lessons = Lesson::all();
        
        return response()->json([
            'data' => $lessons->toArray() // nests information within a 'data' array.
        ], 200);
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson)
        {
            return response()->json([
                'error' => [ // will nest errors here to orginize response information.
                    'message' => 'Lesson does not exist'
                ]
            ], 404);
        }
        
        return response()->json([
            'data' => $lesson->toArray()
        ], 200);
    }
}
