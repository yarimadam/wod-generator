<?php

namespace OneFit\Test\WorkoutProgram;

use DateTime;
use OneFit\Activity\ConcreteActivity\BreakActivity;
use OneFit\Exercise\ConcreteExercise\PushUpExercise;
use OneFit\Exercise\ConcreteExercise\ShortSprintExercise;
use OneFit\Person\Person;
use OneFit\Person\PersonLevel;
use OneFit\WorkoutProgram\Governor;
use OneFit\WorkoutProgram\Rule\ConcreteRule\SelfResolvingRule;
use OneFit\WorkoutProgram\Rule\RuleInterface;
use OneFit\WorkoutProgram\WorkoutProgram;
use PHPUnit\Framework\TestCase;

/**
 * Class WorkoutProgramTest
 * @package OneFit\Test\WorkoutProgram
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class WorkoutProgramTest extends TestCase
{
    public function testGetExerciseCount()
    {
        $workoutProgram = self::createWorkoutProgram();

        $pushUpExercise = new PushUpExercise();
        $breakActivity = new BreakActivity();
        $shortSprintExercise = new ShortSprintExercise();

        try {
            $workoutProgram->addActivity($pushUpExercise);
            $workoutProgram->addActivity($breakActivity);
            $workoutProgram->addActivity($shortSprintExercise);
        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }

        $this->assertEquals(2, $workoutProgram->getExerciseCount());
    }

    /**
     * @param Person|null $participant
     * @param Governor|null $governor
     * @param DateTime|null $startDate
     * @param RuleInterface[] $rules
     * @return WorkoutProgram
     */
    public static function createWorkoutProgram(
        Person $participant = null,
        Governor $governor = null,
        DateTime $startDate = null,
        array $rules = null
    ): WorkoutProgram {
        $participant = $participant ?? new Person('Foo Bar', PersonLevel::EXPERT);

        $governor = $governor ?? new Governor();

        $rules = $rules ?? [new SelfResolvingRule()];

        foreach ($rules as $rule) {
            $governor->addRule($rule);
        }

        $startDate = $startDate ?? DateTime::createFromFormat('Y-m-d H:i:s', '2018-01-01 13:00:00');

        return new WorkoutProgram($participant, $governor, $startDate);
    }
}
