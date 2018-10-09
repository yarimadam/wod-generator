<?php

namespace OneFit\WorkoutProgram\Rule\ConcreteRule;

use DateInterval;
use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Person\PersonLevel;
use OneFit\WorkoutProgram\Rule\RuleInterface;
use OneFit\WorkoutProgram\WorkoutProgram;

class BeginnersShouldGetFourBreaksMax implements RuleInterface
{
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration): bool
    {
        $breakCount = $workoutProgram->getBreakCount();
        $isBreak = $activity->getType() === ActivityType::TYPE_BREAK;
        $isBeginner = $workoutProgram->getParticipant()->getLevel() === PersonLevel::BEGINNER;

        if ($isBeginner && $isBreak && $breakCount >= 4) {
            throw new \LogicException('Beginners should not have more than four breaks.');
        }

        return true;
    }
}
