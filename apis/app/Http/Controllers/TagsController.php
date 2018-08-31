<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Lesson;
use Illuminate\Http\Request;
use Acme\Transformers\TagTransformer;

class TagsController extends ApiController
{
    protected $tagTransformer;

    function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;
    }

    public function index($lessonId = null)
    {
        // $lessonId is a wildcard.
        // $tags = $lessonId ? Lesson::find($lessonId)->tags : Tag::all();
        $tags = $this->getTags($lessonId);

        return $this->respond([
            'data' => $this->tagTransformer->transformCollection($tags->all())
        ]);
    }

    private function getTags($lessonId)
    {
        $tags = $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();

        return $tags;
    }
}
