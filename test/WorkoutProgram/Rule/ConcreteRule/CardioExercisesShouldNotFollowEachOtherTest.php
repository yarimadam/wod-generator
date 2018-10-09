<?php

namespace OneFit\Test\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Exercise\ConcreteExercise\HandstandPractiseExercise;
use OneFit\Exercise\ConcreteExercise\JumpingRopeExercise;
use OneFit\Exercise\ConcreteExercise\PushUpExercise;
use OneFit\Exercise\ConcreteExercise\RingExercise;
use OneFit\Exercise\ConcreteExercise\ShortSprintExercise;
use OneFit\Test\WorkoutProgram\WorkoutProgramTest;
use OneFit\WorkoutProgram\Rule\ConcreteRule\CardioExercisesShouldNotFollowEachOther;
use PHPUnit\Framework\TestCase;

/**
 * Class CardioExercisesShouldNotFollowEachOtherTest
 * @package OneFit\Test\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class CardioExercisesShouldNotFollowEachOtherTest extends TestCase
{
    public function testAddCardioExerciseWhilePreviousExerciseTypeIsCardio(): void
    {
        $this->expectException('LogicException');

        $workoutProgram = WorkoutProgramTest::createWorkoutProgram();

        $workoutProgram->addActivity(new PushUpExercise());
        $workoutProgram->addActivity(new RingExercise());
        $workoutProgram->addActivity(new HandstandPractiseExercise());
        $workoutProgram->addActivity(new JumpingRopeExercise());

        $rule = new CardioExercisesShouldNotFollowEachOther();

        $rule->resolve($workoutProgram, new ShortSprintExercise(), DateInterval::createFromDateString('1 minutes'));
    }

    public function testAddCardioExerciseWhilePreviousExerciseTypeIsNonCardio(): void
    {
        $workoutProgram = WorkoutProgramTest::createWorkoutProgram();

        $workoutProgram->addActivity(new PushUpExercise());
        $workoutProgram->addActivity(new RingExercise());

        $rule = new CardioExercisesShouldNotFollowEachOther();

        $resolved = $rule->resolve(
            $workoutProgram,
            new ShortSprintExercise(),
            DateInterval::createFromDateString('1 minutes')
        );

        $this->assertTrue($resolved);
    }
}
