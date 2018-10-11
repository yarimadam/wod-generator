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
 * Class ExpertsShouldGetTwoMinuteBreaks
 * @package OneFit\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ExpertsShouldGetTwoMinuteBreaks implements RuleInterface
{
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration): bool
    {
        $participantLevel = $workoutProgram->getParticipant()->getLevel();

        $participantLevelMatches = PersonLevel::EXPERT === $participantLevel;

        $activityTypeMatches = $activity::getType() === ActivityType::TYPE_BREAK;

        $durationMatches = DomainUtilsTrait::dateIntervalToSeconds($duration) ===
            DomainUtilsTrait::dateIntervalToSeconds(DateInterval::createFromDateString('2 minutes'));

        if ($participantLevelMatches && $activityTypeMatches && $durationMatches === false) {
            throw new \LogicException('Experts should take 2 minute only breaks.');
        }

        return true;
    }
}
