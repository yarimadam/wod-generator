<?php

namespace OneFit\WorkoutProgram\Iterator;

use DateTime;
use OneFit\WorkoutProgram\WorkoutProgramSequence;

/**
 * Class WorkoutProgramSequenceTimeframeIterator
 * @package OneFit\WorkoutProgram\Iterator
 */
class WorkoutProgramSequenceTimeframeIterator extends \FilterIterator
{
    /**
     * @var DateTime
     */
    private $from;
    /**
     * @var DateTime
     */
    private $to;

    public function __construct(\Iterator $iterator, DateTime $from, DateTime $to)
    {
        parent::__construct($iterator);
        $this->from = $from;
        $this->to = $to;
    }

    /** @inheritdoc */
    public function accept()
    {
        /** @var WorkoutProgramSequence $workoutProgramSequence */
        $workoutProgramSequence = $this->getInnerIterator()->current();

        $matchBeginning = ($this->from < $workoutProgramSequence->getEndDate());

        $matchEnding = ($this->to > $workoutProgramSequence->getStartDate());

        if ($matchBeginning && $matchEnding) {
            return true;
        }

        return false;
    }
}
