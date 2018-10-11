<?php

namespace OneFit\Gym;

use OneFit\Activity\ActivityInterface;
use OneFit\Gym\ActivitySlot\ActivitySlotContainer;
use OneFit\Gym\ActivitySlot\Iterator\OccupiedActivitySlotIterator;

/**
 * Class GymState
 * @package OneFit
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class Gym
{
    /** @var ActivitySlotContainer */
    protected $activitySlotContainer;

    /**
     * Gym constructor.
     * @param ActivitySlotContainer $activitySlotContainer
     */
    public function __construct(ActivitySlotContainer $activitySlotContainer = null)
    {
        $this->activitySlotContainer = $activitySlotContainer ?? new ActivitySlotContainer();
    }

    public function getActivitySlotContainer(): ActivitySlotContainer
    {
        return $this->activitySlotContainer;
    }

    public function getNumberOfOccupiedSlots(ActivityInterface $activity, \DateTime $from, \DateTime $to): int
    {
        return iterator_count(
            new OccupiedActivitySlotIterator(
                $this->activitySlotContainer->getIterator(),
                $activity,
                $from,
                $to
            )
        );
    }
}
