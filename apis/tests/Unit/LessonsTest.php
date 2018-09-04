<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LessonsTest extends ApiTester
{
    /** @test */
    public function it_fetches_lesson()
    {
        // Follow an arrage, act, assert pattern.

        // arrange
        $this->makeLesson();

        // act
        $this->getResponse('api/v1/lessons');

        // assert
        $this->assertResponseOk();
    }

    public function it_fetches_single_lesson()
    {
        // Follow an arrage, act, assert pattern.

        // arrange
        $this->makeLesson();

        // act
        $this->getResponse('api/v1/lessons/1');

        dd($this->getResponse('api/v1/lessons/1'));
    }

    private function makeLesson($lessonFields = [])
    {
        $lesson = array_merge([
            'title'     => $this->fake->sentence,
            'body'      => $this->fake->paragraph,
            'some_bool' => $this->fake->boolean
        ], $lessonFields);

        while($this->times--) Lesson::create($lesson);
    }
}
