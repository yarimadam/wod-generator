<?php

namespace OneFit\Test\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ConcreteActivity\BreakActivity;
use OneFit\Exercise\ConcreteExercise\PushUpExercise;
use OneFit\Test\WorkoutProgram\WorkoutProgramTest;
use OneFit\WorkoutProgram\Rule\ConcreteRule\ShouldNotEndWithBreak;
use PHPUnit\Framework\TestCase;

/**
 * Class ShouldNotEndWithBreakTest
 * @package OneFit\Test\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ShouldNotEndWithBreakTest extends TestCase
{
    public function testAddBreakActivityAfterActivityCountAlreadyAtMax()
    {
        $this->expectException('LogicException');

        $workoutProgram = WorkoutProgramTest::createWorkoutProgram();

        for ($i = 1; $i <= $workoutProgram->getMaxNumberOfExercises(); $i++) {
            $workoutProgram->addActivity(new PushUpExercise());
        }

        $rule = new ShouldNotEndWithBreak();

        $breakActivity = new BreakActivity();

        $rule->resolve($workoutProgram, $breakActivity);
    }

    public function testAddBreakActivityBeforeActivityCountReachMax()
    {
        $workoutProgram = WorkoutProgramTest::createWorkoutProgram();

        $workoutProgram->addActivity(new PushUpExercise(), DateInterval::createFromDateString('1 minutes'));

        $rule = new ShouldNotEndWithBreak();

        $breakActivity = new BreakActivity();

        $resolved = $rule->resolve($workoutProgram, $breakActivity);

        $this->assertTrue($resolved);
    }
}
