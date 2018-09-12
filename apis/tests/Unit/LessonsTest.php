<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LessonsTest extends ApiTester
{
    /** @test */
    public function it_fetches_lessons()
    {
        // Follow an arrage, act, assert pattern.

        // arrange
        $this->makeLesson();

        // act
        $lessons = $this->getJson('api/v1/lessons')->data;

        // assert
        $this->assertTrue(true);
    }

    public function it_fetches_single_lesson()
    {
        // Follow an arrage, act, assert pattern.

        // arrange
        $this->makeLesson();

        // act
        $lesson = $this->getJson('api/v1/lessons/1')->data;

        // assert
        $this->assertTrue(true);
        
        $this->asserObjectHasAttributes($lesson, 'body', 'active');
    }

    public function it_404s_if_a_lesson_is_not_found()
    {
        $this->getJson('api/v1/lessons/x');
        $this->assertResponseStatus(404);
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
