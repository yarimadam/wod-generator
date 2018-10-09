<?php

namespace OneFit\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\DomainUtilsTrait;
use OneFit\Person\PersonLevel;
use OneFit\WorkoutProgram\Rule\RuleInterface;
use OneFit\WorkoutProgram\WorkoutProgram;

/**
 * Class BeginnersShouldGetOneMinuteBreaks
 * @package OneFit\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class BeginnersShouldGetOneMinuteBreaks implements RuleInterface
{
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration)
    {
        $participantLevel = $workoutProgram->getParticipant()->getLevel();

        if ($participantLevel === PersonLevel::BEGINNER) {
            if ($activity->getType() == ActivityType::TYPE_BREAK) {
                if (DomainUtilsTrait::dateIntervalToSeconds($duration) !==
                    DomainUtilsTrait::dateIntervalToSeconds(DateInterval::createFromDateString('1 minutes'))) {
                    throw new \LogicException('Beginners should not have breaks more than 1 minute each.');
                }
            }
        }

        return true;
    }
}
