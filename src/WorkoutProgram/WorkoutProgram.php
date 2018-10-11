<?php

namespace OneFit\WorkoutProgram;

use ArrayIterator;
use ArrayObject;
use DateInterval;
use DateTime;
use OneFit\Activity\ActivityCategory;
use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Gym\Gym;
use OneFit\Person\Person;
use OneFit\WorkoutProgram\Iterator\ActivityCategoryIterator;
use OneFit\WorkoutProgram\Iterator\ActivityTypeIterator;

/**
 * Class WorkoutProgram
 * @package OneFit\WorkoutProgram
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class WorkoutProgram
{
    /** @var Gym */
    protected $gym;

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
     * @param Gym $gym
     * @param null|int $maxNumberOfExercises
     */
    public function __construct(
        Person $participant,
        Governor $governor,
        DateTime $startDate,
        Gym $gym,
        int $maxNumberOfExercises = null
    ) {
        $this->participant = $participant;
        $this->governor = $governor;
        $this->startDate = $startDate;
        $this->timeTrack = $startDate;
        $this->maxNumberOfExercises = $maxNumberOfExercises ? $maxNumberOfExercises : 30;
        $this->activities = new ArrayObject();
        $this->defaultActivityDuration = DateInterval::createFromDateString('1 minutes');
        $this->gym = $gym;
    }

    /**
     * @param ActivityInterface $activity Activity.
     * @param DateInterval $duration Activity duration.
     * @return bool True if activity governed by rules, and added to the program. Otherwise, false.
     */
    public function addActivity(ActivityInterface $activity, DateInterval $duration = null): bool
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

    /**
     * @return ArrayObject|ActivityInterface[]
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /** @return int Number of exercises in the workout program. */
    public function getExerciseCount(): int
    {
        return iterator_count(new ActivityCategoryIterator($this->activities, ActivityCategory::CATEGORY_EXERCISE));
    }

    public function getBreakCount(): int
    {
        return iterator_count(new ActivityTypeIterator($this->activities, ActivityType::TYPE_BREAK));
    }

    /** @return int Maximum number of exercises allowed in workout program. */
    public function getMaxNumberOfExercises(): int
    {
        return $this->maxNumberOfExercises;
    }

    public function getTimeTrack(): DateTime
    {
        return $this->timeTrack;
    }

    public function getActivityIterator(): ArrayIterator
    {
        return $this->activities->getIterator();
    }

    public function getParticipant(): Person
    {
        return $this->participant;
    }

    public function getGym(): Gym
    {
        return $this->gym;
    }
}
