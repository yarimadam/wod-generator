<?php

namespace OneFit\WorkoutProgram\Rule;

use DateInterval;
use OneFit\Activity\ActivityInterface;
use OneFit\WorkoutProgram\WorkoutProgram;

/**
 * Interface RuleInterface
 * @package OneFit\WorkoutProgram\Rule
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
interface RuleInterface
{
    /**
     * @param WorkoutProgram $workoutProgram
     * @param ActivityInterface $activity
     * @param DateInterval $duration
     * @return mixed
     */
    public function resolve(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration);
}
