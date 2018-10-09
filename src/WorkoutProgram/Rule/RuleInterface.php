<?php

namespace OneFit\WorkoutProgram\Rule;

use OneFit\Activity\ActivityInterface;
use OneFit\WorkoutProgram\WorkoutProgram;

/**
 * Interface RuleInterface
 * @package OneFit\WorkoutProgram\Rule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
interface RuleInterface
{
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity);
}