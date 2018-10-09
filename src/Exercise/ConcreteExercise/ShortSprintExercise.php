<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Exercise\AbstractExercise;

/**
 * Class ShortSprintExercise
 * @package OneFit\Exercise\ConcreteExercise,
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
final class ShortSprintExercise extends AbstractExercise implements ActivityInterface
{
    /**
     * ShortSprintExercise constructor.
     */
    public function __construct()
    {
        $this->name = 'Short Sprint';
        $this->type = ActivityType::TYPE_CARDIO;
    }
}
