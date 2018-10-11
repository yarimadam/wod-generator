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
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration): bool
    {
        $participantLevel = $workoutProgram->getParticipant()->getLevel();

        $participantLevelMatches = PersonLevel::BEGINNER === $participantLevel;

        $activityTypeMatches = $activity::getType() === ActivityType::TYPE_BREAK;

        $durationMatches = DomainUtilsTrait::dateIntervalToSeconds($duration) ===
            DomainUtilsTrait::dateIntervalToSeconds(DateInterval::createFromDateString('1 minutes'));

        if ($participantLevelMatches && $activityTypeMatches && $durationMatches === false) {
            throw new \LogicException('Beginners should take 1 minute only breaks.');
        }

        return true;
    }
}
