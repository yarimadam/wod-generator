<?php

namespace OneFit\Gym\ActivitySlot;

use OneFit\Activity\ActivityInterface;

/**
 * Class ActivitySlot
 * @package OneFit\Gym
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ActivitySlot
{
    /** @var ActivityInterface */
    protected $activity;

    /** @var \DateTime */
    protected $from;

    /** @var \DateTime */
    protected $to;

    /**
     * ActivitySlot constructor.
     * @param ActivityInterface $activity
     * @param \DateTime $from
     * @param \DateTime $to
     */
    public function __construct(ActivityInterface $activity, \DateTime $from, \DateTime $to)
    {
        $this->activity = $activity;
        $this->from = clone $from;
        $this->to = clone $to;
    }

    public function getActivity(): ActivityInterface
    {
        return $this->activity;
    }

    public function isOccupied(\DateTime $from, \DateTime $to): bool
    {
        if ($this->behindOfSlot($from, $to) || $this->aheadOfSlot($from, $to)) {
            return false;
        }
        return true;
    }

    protected function behindOfSlot(\DateTime $from, \DateTime $to): bool
    {
        $fromLessThanFrom = $from < $this->from;
        $toLessThanFrom = $to < $this->from;
        $toEqualToFrom = $to == $this->from;

        if ($fromLessThanFrom && ($toLessThanFrom || $toEqualToFrom)) {
            return true;
        }
        return false;
    }

    protected function aheadOfSlot(\DateTime $from, \DateTime $to): bool
    {
        $fromGreaterThanTo = $from > $this->to;
        $fromEqualToTo = $from == $this->to;
        $toGreaterThanTo = $to > $this->to;

        if (($fromGreaterThanTo || $fromEqualToTo) && $toGreaterThanTo) {
            return true;
        }
        return false;
    }
}
