<?php

namespace OneFit\Test\WorkoutProgram\Rule\ConcreteRule;

use OneFit\Exercise\ConcreteExercise\RingExercise;
use OneFit\Gym\Gym;
use OneFit\Test\WorkoutProgram\WorkoutProgramTest;
use OneFit\WorkoutProgram\Rule\ConcreteRule\OneRingExerciseShouldBePerformedAtSameTime;
use PHPUnit\Framework\TestCase;

class OneRingExerciseShouldBePerformedAtSameTimeTest extends TestCase
{
    public function testAddRingExerciseWhileOneExistAtDifferentWorkoutProgram(): void
    {
        $this->expectException('LogicException');

        $generalGym = new Gym();

        $workoutProgramA = WorkoutProgramTest::createWorkoutProgram(null, null, null, $generalGym);

        $workoutProgramA->addActivity(new RingExercise());

        $workoutProgramB = WorkoutProgramTest::createWorkoutProgram(null, null, null, $generalGym);

        $rule = new OneRingExerciseShouldBePerformedAtSameTime();

        $rule->resolve($workoutProgramB, new RingExercise(), \DateInterval::createFromDateString('1 minutes'));
    }
}
