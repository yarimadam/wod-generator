<?php

namespace OneFit\Test;

use OneFit\Exercise\ConcreteExercise\PushUpExercise;
use OneFit\Gym\ActivitySlot\ActivitySlot;
use PHPUnit\Framework\TestCase;

/**
 * Class ActivitySlotTest
 * @package OneFit\Test
 */
class ActivitySlotTest extends TestCase
{
    public function testOccupiedTimeframe(): void
    {
        $activity = new PushUpExercise();

        $from = new \DateTime('now');
        $to = clone $from;
        $to->add(\DateInterval::createFromDateString('1 minutes'));

        $activitySlot = new ActivitySlot($activity, $from, $to);

        $occupied = $activitySlot->isOccupied($from, $to);

        $this->assertTrue($occupied);
    }

    public function testFreeTimeframe(): void
    {
        $activity = new PushUpExercise();

        $from = new \DateTime('now');
        $to = clone $from;
        $to->add(\DateInterval::createFromDateString('1 minutes'));

        $activitySlot = new ActivitySlot($activity, $from, $to);

        $aheadFrom = clone $from;
        $aheadFrom->add(\DateInterval::createFromDateString('1 minutes'));
        $aheadTo = clone $to;
        $aheadTo->add(\DateInterval::createFromDateString('1 minutes'));

        $occupied = $activitySlot->isOccupied($aheadFrom, $aheadTo);

        $this->assertFalse($occupied);
    }
}