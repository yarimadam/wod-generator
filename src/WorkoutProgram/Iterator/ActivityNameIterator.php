<?php

namespace OneFit\WorkoutProgram\Iterator;

use OneFit\WorkoutProgram\WorkoutProgramSequence;

/**
 * Class ActivityNameIterator
 * @package OneFit\WorkoutProgram\Iterator
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ActivityNameIterator extends AbstractActivityIterator
{
    protected function getCompareValue(WorkoutProgramSequence $workoutProgramSequence): string
    {
        return $workoutProgramSequence->getActivity()->getName();
    }
}
