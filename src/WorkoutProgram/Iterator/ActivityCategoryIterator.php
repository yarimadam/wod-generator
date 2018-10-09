<?php

namespace OneFit\WorkoutProgram\Iterator;

use ArrayObject;
use FilterIterator;
use OneFit\WorkoutProgram\WorkoutProgramSequence;

/**
 * Class ActivityCategoryIterator
 * @package OneFit\WorkoutProgram\Iterator
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ActivityCategoryIterator extends FilterIterator
{
    /** @var string */
    protected $filter;

    /**
     * ActivityCategoryIterator constructor.
     * @param ArrayObject $activities
     * @param string $filter
     */
    public function __construct(ArrayObject $activities, string $filter)
    {
        parent::__construct($activities->getIterator());
        $this->filter = $filter;
    }

    /** @inheritdoc */
    public function accept()
    {
        /** @var WorkoutProgramSequence $sequence */
        $sequence = $this->getInnerIterator()->current();

        if ($sequence->getActivity()->getCategory() === $this->filter) {
            return true;
        }

        return false;
    }
}
