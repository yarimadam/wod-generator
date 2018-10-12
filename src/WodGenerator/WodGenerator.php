<?php

namespace OneFit\WodGenerator;

use DateInterval;
use DateTime;
use OneFit\WorkoutProgram\Iterator\WorkoutProgramSequenceTimeframeIterator;
use OneFit\WorkoutProgram\WorkoutProgram;

/**
 * Class WodGenerator
 * @package OneFit\WodGenerator
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class WodGenerator
{
    /** @var DateTime */
    protected $timeTrack;

    /** @var DateInterval */
    protected $iterateInterval;

    /** @var WorkoutProgram[] */
    protected $workoutPrograms;

    /** @var DateTime */
    protected $timeIndex;

    /** @var array[array] */
    protected $timeLine;

    /** @var int */
    protected $totalIterations = 0;

    /**
     * WodGenerator constructor.
     * @param DateTime $startDate
     */
    public function __construct(DateTime $startDate)
    {
        $this->timeTrack = clone $startDate;
        $this->timeIndex = DateTime::createFromFormat('i:s', '00:00');
        $this->iterateInterval = DateInterval::createFromDateString('1 minutes');
    }

    public function addWorkoutProgram(WorkoutProgram $workoutProgram): void
    {
        $totalSequence = iterator_count($workoutProgram->getActivityIterator());

        if ($totalSequence > $this->totalIterations) {
            $this->totalIterations = $totalSequence;
        }

        $this->workoutPrograms[] = $workoutProgram;
    }

    public function generate(): void
    {
        for ($i = 1; $i <= $this->totalIterations; $i++) {
            $from = clone $this->timeTrack;
            $to = clone $this->timeTrack;
            $to->add($this->iterateInterval);

            $activitySequence = $this->getActivitySequenceForGivenTimeframe($from, $to);

            $this->timeLine[$this->getCurrentTimelineRange()] = $activitySequence;

            $this->timeTrack->add($this->iterateInterval);
            $this->timeIndex->add($this->iterateInterval);
        }

        print_r($this->timeLine);
    }

    private function getCurrentTimelineRange(): string
    {
        $from = $this->timeIndex->format('i:s');
        $to = clone $this->timeIndex;
        $to = $to->add($this->iterateInterval)->format('i:s');

        return sprintf('%s - %s', $from, $to);
    }

    private function getActivitySequenceForGivenTimeframe(DateTime $from, DateTime $to): string
    {
        $array = [];

        foreach ($this->workoutPrograms as $workoutProgram) {
            $wpSequences = new WorkoutProgramSequenceTimeframeIterator(
                $workoutProgram->getActivityIterator(),
                $from,
                $to
            );

            $name = $workoutProgram->getParticipant()->getName();

            $activities = [];

            foreach ($wpSequences as $wpSequence) {
                $activities[] = $wpSequence->getActivity()->getName();
            }

            $array[] = $name . ' will do ' . implode('and', $activities);
        }

        return implode(', ', $array);
    }
}
