<?php

namespace OneFit\WorkoutProgram\Rule\ConcreteRule;

use OneFit\Activity\ActivityInterface;
use OneFit\WorkoutProgram\Rule\RuleInterface;
use OneFit\WorkoutProgram\WorkoutProgram;

/**
 * Class SelfResolvingRule
 * @package OneFit\WorkoutProgram\Rule\ConcreteRule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class SelfResolvingRule implements RuleInterface
{
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity)
    {
        return true;
    }
}