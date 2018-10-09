<?php

namespace OneFit\WorkoutProgram\Iterator;

use OneFit\WorkoutProgram\WorkoutProgramSequence;

/**
 * Class ActivityTypeIterator
 * @package OneFit\WorkoutProgram\Iterator
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ActivityTypeIterator extends AbstractActivityIterator
{
    protected function getCompareValue(WorkoutProgramSequence $workoutProgramSequence): string
    {
        return $workoutProgramSequence->getActivity()->getType();
    }
}
