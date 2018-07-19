<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Acme\Transformers\LessonTransformer;
use App\Lesson;

class LessonsController extends ApiController
{
    protected $lessonTransformer;

    function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
    }

    public function index()
    {
        // 1. "all()" is bad.
        // 2. no way to attach meta data is bad
        // 3. linking db structure to API output is bad
        // 4. no way to signal headers/response codes is bad
        
        $lessons = Lesson::all();
        
        return $this->respond([
            'data' => $this->lessonTransformer->transformCollection($lessons->all()) // nests information within a 'data' array.
        ]);
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson)
        {
            return $this->respondNotFound('Lesson does not exist.');
        }
        
        return $this->respond([
            'data' => $this->lessonTransformer->transform($lesson)
        ]);
    }
}
