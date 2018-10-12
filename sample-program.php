<?php

use OneFit\Activity\ConcreteActivity\BreakActivity;
use OneFit\Exercise\ConcreteExercise\HandstandPractiseExercise;
use OneFit\Exercise\ConcreteExercise\PullUpExercise;
use OneFit\Exercise\ConcreteExercise\RingExercise;
use OneFit\Exercise\ConcreteExercise\ShortSprintExercise;
use OneFit\Gym\Gym;
use OneFit\Person\Person;
use OneFit\Person\PersonLevel;
use OneFit\WodGenerator\WodGenerator;
use OneFit\WorkoutProgram\Governor;
use OneFit\WorkoutProgram\Rule\ConcreteRule\BeginnersShouldDoOneHandstandExerciseMax;
use OneFit\WorkoutProgram\Rule\ConcreteRule\BeginnersShouldGetFourBreaksMax;
use OneFit\WorkoutProgram\Rule\ConcreteRule\BeginnersShouldGetOneMinuteBreaks;
use OneFit\WorkoutProgram\Rule\ConcreteRule\CardioExercisesShouldNotFollowEachOther;
use OneFit\WorkoutProgram\Rule\ConcreteRule\ExpertsShouldGetTwoMinuteBreaks;
use OneFit\WorkoutProgram\Rule\ConcreteRule\OnePullUpExerciseShouldBePerformedAtSameTime;
use OneFit\WorkoutProgram\Rule\ConcreteRule\OneRingExerciseShouldBePerformedAtSameTime;
use OneFit\WorkoutProgram\Rule\ConcreteRule\ShouldNotBeginWithBreak;
use OneFit\WorkoutProgram\Rule\ConcreteRule\ShouldNotEndWithBreak;
use OneFit\WorkoutProgram\WorkoutProgram;

require 'vendor/autoload.php';

$gym = new Gym();

$governor = new Governor();
$governor->addRule(new BeginnersShouldDoOneHandstandExerciseMax());
$governor->addRule(new BeginnersShouldGetFourBreaksMax());
$governor->addRule(new BeginnersShouldGetOneMinuteBreaks());
$governor->addRule(new CardioExercisesShouldNotFollowEachOther());
$governor->addRule(new ExpertsShouldGetTwoMinuteBreaks());
$governor->addRule(new OnePullUpExerciseShouldBePerformedAtSameTime());
$governor->addRule(new OneRingExerciseShouldBePerformedAtSameTime());
$governor->addRule(new ShouldNotBeginWithBreak());
$governor->addRule(new ShouldNotEndWithBreak());

// Today at 17:00
$startDate = new DateTime('now');
$startDate->setTime(17, 00);

/* Person: John Doe, Beginner */
$johnDoe = new Person('John Doe', PersonLevel::BEGINNER);

$johnDoeWorkoutProgram = new WorkoutProgram($johnDoe, $governor, $startDate, $gym);

try {
    $johnDoeWorkoutProgram->addActivity(new PullUpExercise());
    $johnDoeWorkoutProgram->addActivity(new HandstandPractiseExercise());
    $johnDoeWorkoutProgram->addActivity(new BreakActivity());
    $johnDoeWorkoutProgram->addActivity(new ShortSprintExercise());
    $johnDoeWorkoutProgram->addActivity(new BreakActivity());
    $johnDoeWorkoutProgram->addActivity(new ShortSprintExercise());
    $johnDoeWorkoutProgram->addActivity(new RingExercise());
} catch (Exception $e) {
    echo sprintf('Caught Exception: %s%s', $e->getMessage(), PHP_EOL);
}

/* Person: Foo Bar, Expert */
$fooBar = new Person('Foo Bar', PersonLevel::EXPERT);

$fooBarWorkoutProgram = new WorkoutProgram($fooBar, $governor, $startDate, $gym);

try {
    $fooBarWorkoutProgram->addActivity(new HandstandPractiseExercise());
    $fooBarWorkoutProgram->addActivity(new PullUpExercise());
    $fooBarWorkoutProgram->addActivity(new BreakActivity(), DateInterval::createFromDateString('2 minutes'));
    $fooBarWorkoutProgram->addActivity(new ShortSprintExercise());
    $fooBarWorkoutProgram->addActivity(new HandstandPractiseExercise());
} catch (Exception $e) {
    echo sprintf('Caught Exception: %s%s', $e->getMessage(), PHP_EOL);
}

/* Generator */
$wodGenerator = new WodGenerator($startDate);
$wodGenerator->addWorkoutProgram($johnDoeWorkoutProgram);
$wodGenerator->addWorkoutProgram($fooBarWorkoutProgram);
$wodGenerator->generate();
