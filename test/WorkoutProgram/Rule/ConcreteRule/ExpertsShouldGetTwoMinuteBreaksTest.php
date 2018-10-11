<?php

namespace OneFit\Test\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ConcreteActivity\BreakActivity;
use OneFit\Person\Person;
use OneFit\Person\PersonLevel;
use OneFit\Test\WorkoutProgram\WorkoutProgramTest;
use OneFit\WorkoutProgram\Rule\ConcreteRule\ExpertsShouldGetTwoMinuteBreaks;
use PHPUnit\Framework\TestCase;

/**
 * Class ExpertsShouldGetTwoMinuteBreaksTest
 * @package OneFit\Test\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ExpertsShouldGetTwoMinuteBreaksTest extends TestCase
{
    public function testExpertGetsThreeMinuteBreak(): void
    {
        $this->expectException('LogicException');

        $participant = new Person('Foo Bar', PersonLevel::EXPERT);

        $workoutProgram = WorkoutProgramTest::createWorkoutProgram($participant);

        $rule = new ExpertsShouldGetTwoMinuteBreaks();

        $breakActivity = new BreakActivity();

        $rule->resolve($workoutProgram, $breakActivity, DateInterval::createFromDateString('3 minutes'));
    }

    public function testExpertGetsTwoMinuteBreak(): void
    {
        $beginner = new Person('Foo Bar', PersonLevel::EXPERT);

        $workoutProgram = WorkoutProgramTest::createWorkoutProgram($beginner);

        $rule = new ExpertsShouldGetTwoMinuteBreaks();

        $breakActivity = new BreakActivity();

        $resolved = $rule->resolve($workoutProgram, $breakActivity, DateInterval::createFromDateString('2 minutes'));

        $this->assertTrue($resolved);
    }
}
