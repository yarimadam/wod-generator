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

    /**
     * WorkoutProgramSequence constructor.
     * @param WorkoutProgram $workoutProgram
     * @param ActivityInterface $activity
     * @param DateInterval $duration
     */
    public function __construct(WorkoutProgram $workoutProgram, ActivityInterface $activity, DateInterval $duration)
    {
        $this->workoutProgram = $workoutProgram;
        $this->activity = $activity;
        $this->duration = $duration;

        $this->startDate = clone $workoutProgram->getTimeTrack();
        $this->endDate = clone $workoutProgram->getTimeTrack()->add($duration);

        $workoutProgram->getTimeTrack()->add($duration);
    }

    /** @return ActivityInterface */
    public function getActivity(): ActivityInterface
    {
        return $this->activity;
    }
}
