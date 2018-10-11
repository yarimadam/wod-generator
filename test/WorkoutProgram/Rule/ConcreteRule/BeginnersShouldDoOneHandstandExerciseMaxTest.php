<?php

namespace OneFit\Test\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ConcreteActivity\BreakActivity;
use OneFit\Exercise\ConcreteExercise\HandstandPractiseExercise;
use OneFit\Exercise\ConcreteExercise\PushUpExercise;
use OneFit\Person\Person;
use OneFit\Person\PersonLevel;
use OneFit\Test\WorkoutProgram\WorkoutProgramTest;
use OneFit\WorkoutProgram\Rule\ConcreteRule\BeginnersShouldDoOneHandstandExerciseMax;
use PHPUnit\Framework\TestCase;

class BeginnersShouldDoOneHandstandExerciseMaxTest extends TestCase
{
    public function testAddHandstandPractiseExerciseWhileOneExistForBeginner(): void
    {
        $this->expectException('LogicException');

        $participant = new Person('Foo Bar', PersonLevel::BEGINNER);
        $workoutProgram = WorkoutProgramTest::createWorkoutProgram($participant);

        $workoutProgram->addActivity(new PushUpExercise());
        $workoutProgram->addActivity(new BreakActivity());
        $workoutProgram->addActivity(new HandstandPractiseExercise());
        $workoutProgram->addActivity(new BreakActivity());

        $rule = new BeginnersShouldDoOneHandstandExerciseMax();

        $rule->resolve(
            $workoutProgram,
            new HandstandPractiseExercise(),
            DateInterval::createFromDateString('1 minutes')
        );
    }

    public function testAddHandstandPractiseExerciseWhileOneExistForExpert(): void
    {
        $workoutProgram = WorkoutProgramTest::createWorkoutProgram();

        $workoutProgram->addActivity(new PushUpExercise());
        $workoutProgram->addActivity(new BreakActivity());
        $workoutProgram->addActivity(new HandstandPractiseExercise());
        $workoutProgram->addActivity(new BreakActivity());

        $rule = new BeginnersShouldDoOneHandstandExerciseMax();

        $resolved = $rule->resolve(
            $workoutProgram,
            new HandstandPractiseExercise(),
            DateInterval::createFromDateString('1 minutes')
        );

        $this->assertTrue($resolved);
    }

    public function testAddHandstandPractiseExerciseForBeginner(): void
    {
        $participant = new Person('Foo Bar', PersonLevel::BEGINNER);
        $workoutProgram = WorkoutProgramTest::createWorkoutProgram($participant);

        $workoutProgram->addActivity(new PushUpExercise());
        $workoutProgram->addActivity(new BreakActivity());

        $rule = new BeginnersShouldDoOneHandstandExerciseMax();

        $resolved = $rule->resolve(
            $workoutProgram,
            new HandstandPractiseExercise(),
            DateInterval::createFromDateString('1 minutes')
        );

        $this->assertTrue($resolved);
    }
}
