<?php

namespace OneFit\Gym\ActivitySlot\Iterator;

use OneFit\Activity\ActivityInterface;
use OneFit\Gym\ActivitySlot\ActivitySlot;

/**
 * Class OccupiedActivitySlotIterator
 * @package OneFit\Gym\ActivitySlot\Iterator
 */
class OccupiedActivitySlotIterator extends \FilterIterator
{
    /**
     * @var ActivityInterface
     */
    private $activity;
    /**
     * @var \DateTime
     */
    private $from;
    /**
     * @var \DateTime
     */
    private $to;

    public function __construct(
        \Iterator $iterator,
        ActivityInterface $activity,
        \DateTime $from,
        \DateTime $to
    ) {
        parent::__construct($iterator);
        $this->activity = $activity;
        $this->from = $from;
        $this->to = $to;
    }

    /** @inheritdoc */
    public function accept()
    {
        /** @var ActivitySlot $activitySlot */
        $activitySlot = $this->getInnerIterator()->current();

        $activityNameMatches = $activitySlot->getActivity()::getName() === $this->activity::getName();

        if ($activityNameMatches && $activitySlot->isOccupied($this->from, $this->to)) {
            return true;
        }

        return false;
    }
}
