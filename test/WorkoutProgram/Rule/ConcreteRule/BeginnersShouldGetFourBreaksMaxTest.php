<?php

namespace OneFit\Test\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ConcreteActivity\BreakActivity;
use OneFit\Exercise\ConcreteExercise\HandstandPractiseExercise;
use OneFit\Exercise\ConcreteExercise\JumpingJackExercise;
use OneFit\Exercise\ConcreteExercise\PushUpExercise;
use OneFit\Exercise\ConcreteExercise\RingExercise;
use OneFit\Exercise\ConcreteExercise\ShortSprintExercise;
use OneFit\Person\Person;
use OneFit\Person\PersonLevel;
use OneFit\Test\WorkoutProgram\WorkoutProgramTest;
use OneFit\WorkoutProgram\Rule\ConcreteRule\BeginnersShouldGetFourBreaksMax;
use PHPUnit\Framework\TestCase;

class BeginnersShouldGetFourBreaksMaxTest extends TestCase
{
    public function testAddBreakAfterFourthBreak(): void
    {
        $this->expectException('LogicException');

        $participant = new Person('Foo Bar', PersonLevel::BEGINNER);
        $workoutProgram = WorkoutProgramTest::createWorkoutProgram($participant);

        $workoutProgram->addActivity(new PushUpExercise());
        $workoutProgram->addActivity(new BreakActivity());
        $workoutProgram->addActivity(new JumpingJackExercise());
        $workoutProgram->addActivity(new BreakActivity());
        $workoutProgram->addActivity(new RingExercise());
        $workoutProgram->addActivity(new BreakActivity());
        $workoutProgram->addActivity(new HandstandPractiseExercise());
        $workoutProgram->addActivity(new BreakActivity());
        $workoutProgram->addActivity(new ShortSprintExercise());

        $rule = new BeginnersShouldGetFourBreaksMax();

        $rule->resolve($workoutProgram, new BreakActivity(), DateInterval::createFromDateString('1 minutes'));
    }

    public function testAddBreakAfterFirstBreak(): void
    {
        $participant = new Person('Foo Bar', PersonLevel::BEGINNER);
        $workoutProgram = WorkoutProgramTest::createWorkoutProgram($participant);

        $workoutProgram->addActivity(new PushUpExercise());
        $workoutProgram->addActivity(new BreakActivity());

        $rule = new BeginnersShouldGetFourBreaksMax();

        $resolved = $rule->resolve(
            $workoutProgram,
            new BreakActivity(),
            DateInterval::createFromDateString('1 minutes')
        );

        $this->assertTrue($resolved);
    }
}
