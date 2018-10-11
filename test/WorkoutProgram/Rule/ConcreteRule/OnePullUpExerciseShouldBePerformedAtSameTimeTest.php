<?php

namespace OneFit\Test\WorkoutProgram\Rule\ConcreteRule;

use OneFit\Exercise\ConcreteExercise\PullUpExercise;
use OneFit\Gym\Gym;
use OneFit\Test\WorkoutProgram\WorkoutProgramTest;
use OneFit\WorkoutProgram\Rule\ConcreteRule\OnePullUpExerciseShouldBePerformedAtSameTime;
use PHPUnit\Framework\TestCase;

class OnePullUpExerciseShouldBePerformedAtSameTimeTest extends TestCase
{
    public function testAddPullUpExerciseWhileOneExistAtDifferentWorkoutProgram(): void
    {
        $this->expectException('LogicException');

        $generalGym = new Gym();

        $workoutProgramA = WorkoutProgramTest::createWorkoutProgram(null, null, null, $generalGym);

        $workoutProgramA->addActivity(new PullUpExercise());

        $workoutProgramB = WorkoutProgramTest::createWorkoutProgram(null, null, null, $generalGym);

        $rule = new OnePullUpExerciseShouldBePerformedAtSameTime();

        $rule->resolve($workoutProgramB, new PullUpExercise(), \DateInterval::createFromDateString('1 minutes'));
    }
}
