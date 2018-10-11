<?php

namespace OneFit\WorkoutProgram;

use DateInterval;
use DateTime;
use OneFit\Activity\ActivityInterface;

/**
 * Class WorkoutProgramSequence
 * @package OneFit\WorkoutProgram
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class WorkoutProgramSequence
{
    /** @var ActivityInterface */
    protected $activity;

    /** @var WorkoutProgram */
    protected $workoutProgram;

    /** @var DateInterval */
    protected $duration;

    /** @var DateTime */
    protected $startDate;

    /** @var DateTime */
    protected $endDate;

    public function __construct(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration)
    {
        $this->workoutProgram = $workoutProgram;
        $this->activity = $activity;
        $this->duration = $duration;

        $startDate = clone $workoutProgram->getTimeTrack();
        $endDate = clone $startDate;
        $endDate->add($duration);

        $this->startDate = $startDate;
        $this->endDate = $endDate;

        $workoutProgram->getGym()->getActivitySlotContainer()->occupySlot($activity, $startDate, $endDate);

        $workoutProgram->getTimeTrack()->add($duration);
    }

    public function getActivity(): ActivityInterface
    {
        return $this->activity;
    }
}
