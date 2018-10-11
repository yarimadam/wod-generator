<?php

namespace OneFit\Gym\ActivitySlot;

use OneFit\Activity\ActivityInterface;

/**
 * Class ActivitySlotContainer
 * @package OneFit\Gym\ActiviySlot
 */
class ActivitySlotContainer implements \IteratorAggregate
{
    /** @var \ArrayObject|ActivitySlot[] */
    protected $activitySlots;

    /**
     * ActivitySlotContainer constructor.
     */
    public function __construct()
    {
        $this->activitySlots = new \ArrayObject();
    }

    public function occupySlot(ActivityInterface $activity, \DateTime $from, \DateTime $to): void
    {
        $this->activitySlots->append(new ActivitySlot($activity, $from, $to));
    }

    public function getIterator(): \ArrayIterator
    {
        return $this->activitySlots->getIterator();
    }
}
