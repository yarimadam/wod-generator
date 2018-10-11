<?php

namespace OneFit\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\WorkoutProgram\Rule\RuleInterface;
use OneFit\WorkoutProgram\WorkoutProgram;

/**
 * Class ShouldNotBeginWithBreak
 * @package OneFit\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ShouldNotBeginWithBreak implements RuleInterface
{
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration): bool
    {
        $exerciseCount = $workoutProgram->getExerciseCount();
        $exerciseType = $activity::getType();

        if ($exerciseCount === 0 && $exerciseType === ActivityType::TYPE_BREAK) {
            throw new \LogicException('Program should not start with "Break"');
        }

        return true;
    }
}
