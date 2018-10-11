<?php

namespace OneFit\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\WorkoutProgram\Rule\RuleInterface;
use OneFit\WorkoutProgram\WorkoutProgram;

/**
 * Class ShouldNotEndWithBreak
 * @package OneFit\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ShouldNotEndWithBreak implements RuleInterface
{
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration): bool
    {
        $exerciseCount = $workoutProgram->getExerciseCount();
        $maxNumberOfExercises = $workoutProgram->getMaxNumberOfExercises();
        $exerciseType = $activity::getType();

        if ($exerciseCount === $maxNumberOfExercises && $exerciseType === ActivityType::TYPE_BREAK) {
            throw new \LogicException('Program should not end with "Break"');
        }

        return true;
    }
}
