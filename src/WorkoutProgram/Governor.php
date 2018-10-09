<?php

namespace OneFit\WorkoutProgram;

use OneFit\Activity\ActivityInterface;
use OneFit\WorkoutProgram\Rule\RuleInterface;

/**
 * Class Governor
 * @package OneFit\WorkoutProgram
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class Governor
{
    /** @var RuleInterface[] */
    protected $rules;

    /**
     * @param WorkoutProgram $workoutProgram
     * @param ActivityInterface $exercise
     * @return bool
     */
    public function govern(WorkoutProgram $workoutProgram, ActivityInterface $exercise): bool
    {
        foreach ($this->rules as $rule) {
            if ($rule->resolve($workoutProgram, $exercise) === false) {
                return false;
            }
        }

        return true;
    }

    /** @param RuleInterface $rule */
    public function addRule(RuleInterface $rule)
    {
        $this->rules[] = $rule;
    }
}
