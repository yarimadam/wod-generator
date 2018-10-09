<?php

namespace OneFit\Test\WorkoutProgram;

use OneFit\Exercise\ConcreteExercise\PushUpExercise;
use PHPUnit\Framework\TestCase;

/**
 * Class WorkoutProgramSequenceTest
 * @package OneFit\Test\WorkoutProgram
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class WorkoutProgramSequenceTest extends TestCase
{
    public function testObjectCreation()
    {
        $workoutProgram = WorkoutProgramTest::createWorkoutProgram();

        $added = $workoutProgram->addActivity(new PushUpExercise());

        $this->assertTrue($added);
    }
}
