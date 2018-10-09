<?php

namespace OneFit\Test\WorkoutProgram\Rule\ConcreteRule;

use OneFit\Activity\ConcreteActivity\BreakActivity;
use OneFit\Exercise\ConcreteExercise\PushUpExercise;
use OneFit\Test\WorkoutProgram\WorkoutProgramTest;
use OneFit\WorkoutProgram\Rule\ConcreteRule\ShouldNotBeginWithBreak;
use PHPUnit\Framework\TestCase;

/**
 * Class ShouldNotBeginWithBreakTest
 * @package OneFit\Test\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ShouldNotBeginWithBreakTest extends TestCase
{
    public function testAddBreakActivityWhileNoExercisePresent()
    {
        $this->expectException('LogicException');

        $workoutProgram = WorkoutProgramTest::createWorkoutProgram();

        $workoutProgram->addActivity(new BreakActivity());

        $rule = new ShouldNotBeginWithBreak();

        $rule->resolve($workoutProgram, new BreakActivity());
    }

    public function testAddBreakActivityWhileOneExercisePresent()
    {
        $workoutProgram = WorkoutProgramTest::createWorkoutProgram();

        $workoutProgram->addActivity(new PushUpExercise());

        $rule = new ShouldNotBeginWithBreak();

        $resolved = $rule->resolve($workoutProgram, new BreakActivity());

        $this->assertTrue($resolved);
    }
}
