<?php

namespace OneFit\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ActivityInterface;
use OneFit\Exercise\ConcreteExercise\HandstandPractiseExercise;
use OneFit\Person\PersonLevel;
use OneFit\WorkoutProgram\Iterator\ActivityNameIterator;
use OneFit\WorkoutProgram\Rule\RuleInterface;
use OneFit\WorkoutProgram\WorkoutProgram;

/**
 * Class BeginnersShouldDoOneHandstandExerciseMax
 * @package OneFit\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class BeginnersShouldDoOneHandstandExerciseMax implements RuleInterface
{
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration): bool
    {
        $handstandExerciseCount = iterator_count(
            new ActivityNameIterator($workoutProgram->getActivities(), HandstandPractiseExercise::NAME)
        );

        $participantLevelMatches = $workoutProgram->getParticipant()->getLevel() === PersonLevel::BEGINNER;

        $activityNameMatches = $activity->getName() === HandstandPractiseExercise::NAME;

        if ($participantLevelMatches && $activityNameMatches && $handstandExerciseCount > 0) {
            throw new \LogicException('Beginners should do a maximum of one handstand practise exercise.');
        }

        return true;
    }
}
