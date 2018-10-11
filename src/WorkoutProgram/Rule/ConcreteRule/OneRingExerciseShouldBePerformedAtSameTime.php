<?php

namespace OneFit\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ActivityInterface;
use OneFit\Exercise\ConcreteExercise\RingExercise;
use OneFit\WorkoutProgram\Rule\RuleInterface;
use OneFit\WorkoutProgram\WorkoutProgram;

/**
 * Class OneRingExerciseShouldBePerformedAtSameTime
 * @package OneFit\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class OneRingExerciseShouldBePerformedAtSameTime implements RuleInterface
{
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration): bool
    {
        $startDate = clone $workoutProgram->getTimeTrack();
        $endDate = clone $startDate;
        $endDate->add($duration);

        $numberOfRingExercises = $workoutProgram->getGym()->getNumberOfOccupiedSlots($activity, $startDate, $endDate);

        if ($activity::getName() === RingExercise::getName() && $numberOfRingExercises >= 1) {
            throw new \LogicException('There isn\'t any available slots for Ring Exercise at given timeframe.');
        }

        return true;
    }
}
