<?php

namespace OneFit\WorkoutProgram\Iterator;

use OneFit\WorkoutProgram\WorkoutProgramSequence;

/**
 * Class ActivityCategoryIterator
 * @package OneFit\WorkoutProgram\Iterator
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ActivityCategoryIterator extends AbstractActivityIterator
{
    protected function getCompareValue(WorkoutProgramSequence $workoutProgramSequence): string
    {
        return $workoutProgramSequence->getActivity()->getCategory();
    }
}
