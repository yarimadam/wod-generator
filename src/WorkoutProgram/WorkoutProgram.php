<?php

namespace OneFit\WorkoutProgram;

use ArrayIterator;
use ArrayObject;
use DateInterval;
use DateTime;
use OneFit\Activity\ActivityCategory;
use OneFit\Activity\ActivityInterface;
use OneFit\Person\Person;
use OneFit\WorkoutProgram\Iterator\ActivityCategoryIterator;

/**
 * Class WorkoutProgram
 * @package OneFit\WorkoutProgram
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class WorkoutProgram
{
    /** @var Person */
    protected $participant;

    /** @var Governor */
    protected $governor;

    /** @var ArrayObject|ActivityInterface[] */
    protected $activities;

    /** @var int */
    protected $maxNumberOfExercises;

    /** @var DateTime */
    protected $startDate;

    /** @var DateTime */
    protected $timeTrack;

    /** @var DateInterval */
    protected $defaultActivityDuration;

    /**
     * WorkoutProgram constructor.
     * @param Person $participant
     * @param Governor $governor
     * @param DateTime $startDate
     * @param null|int $maxNumberOfExercises
     */
    public function __construct(
        Person $participant,
        Governor $governor,
        DateTime $startDate,
        $maxNumberOfExercises = null
    ) {
        $this->participant = $participant;
        $this->governor = $governor;
        $this->startDate = $startDate;
        $this->timeTrack = $startDate;
        $this->maxNumberOfExercises = $maxNumberOfExercises ? $maxNumberOfExercises : 30;
        $this->activities = new ArrayObject();
        $this->defaultActivityDuration = DateInterval::createFromDateString('1 minutes');
    }

    /**
     * @param ActivityInterface $activity Activity.
     * @param DateInterval $duration Activity duration.
     * @return bool True if activity governed by rules, and added to the program. Otherwise, false.
     */
    public function addActivity(ActivityInterface $activity, DateInterval $duration = null)
    {
        if (is_null($duration)) {
            $duration = $this->defaultActivityDuration;
        }

        if ($this->governor->govern($this, $activity, $duration)) {
            $this->activities->append(new WorkoutProgramSequence($this, $activity, $duration));
            return true;
        }
        return false;
    }

    /** @return int Number of exercises in the workout program. */
    public function getExerciseCount(): int
    {
        return iterator_count(new ActivityCategoryIterator($this->activities, ActivityCategory::CATEGORY_EXERCISE));
    }

    /** @return int Maximum number of exercises allowed in workout program. */
    public function getMaxNumberOfExercises(): int
    {
        return $this->maxNumberOfExercises;
    }

    /** @return DateTime Current time track. */
    public function getTimeTrack()
    {
        return $this->timeTrack;
    }

    /** @return ArrayIterator */
    public function getActivityIterator()
    {
        return $this->activities->getIterator();
    }

    /** @return Person */
    public function getParticipant(): Person
    {
        return $this->participant;
    }
}
