<?php

namespace OneFit\Test\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ConcreteActivity\BreakActivity;
use OneFit\Person\Person;
use OneFit\Person\PersonLevel;
use OneFit\Test\WorkoutProgram\WorkoutProgramTest;
use OneFit\WorkoutProgram\Rule\ConcreteRule\BeginnersShouldGetOneMinuteBreaks;
use PHPUnit\Framework\TestCase;

class BeginnersShouldGetOneMinuteBreaksTest extends TestCase
{
    public function testBeginnerGetsTwoMinuteBreak()
    {
        $this->expectException('LogicException');

        $beginner = new Person('Foo Bar', PersonLevel::BEGINNER);

        $workoutProgram = WorkoutProgramTest::createWorkoutProgram($beginner);

        $rule = new BeginnersShouldGetOneMinuteBreaks();

        $breakActivity = new BreakActivity();

        $rule->resolve($workoutProgram, $breakActivity, DateInterval::createFromDateString('2 minutes'));
    }

    public function testBeginnerGetsOneMinuteBreak()
    {
        $beginner = new Person('Foo Bar', PersonLevel::BEGINNER);

        $workoutProgram = WorkoutProgramTest::createWorkoutProgram($beginner);

        $rule = new BeginnersShouldGetOneMinuteBreaks();

        $breakActivity = new BreakActivity();

        $resolved = $rule->resolve($workoutProgram, $breakActivity, DateInterval::createFromDateString('1 minutes'));

        $this->assertTrue($resolved);
    }
}
