<?php

namespace OneFit\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\WorkoutProgram\Rule\RuleInterface;
use OneFit\WorkoutProgram\WorkoutProgram;
use OneFit\WorkoutProgram\WorkoutProgramSequence;

/**
 * Class CardioExercisesShouldNotFollowEachOther
 * @package OneFit\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class CardioExercisesShouldNotFollowEachOther implements RuleInterface
{
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration): bool
    {
        $exerciseCount = $workoutProgram->getExerciseCount();

        if ($exerciseCount === 0) {
            return true;
        }

        $iterator = $workoutProgram->getActivityIterator();

        $iterator->seek(iterator_count($iterator) - 1);

        /** @var WorkoutProgramSequence $workoutProgramSequence */
        $workoutProgramSequence = $iterator->current();

        $lastActivityType = $workoutProgramSequence->getActivity()::getType();
        $activityType = $activity::getType();

        if ($lastActivityType === ActivityType::TYPE_CARDIO && $activityType == ActivityType::TYPE_CARDIO) {
            throw new \LogicException('Cardio exercises should not follow after each other.');
        }

        return true;
    }
}
