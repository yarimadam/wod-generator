<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Exercise\AbstractExercise;

/**
 * Class JumpingRopeExercise
 * @package OneFit\Exercise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
final class JumpingRopeExercise extends AbstractExercise implements ActivityInterface
{
    /**
     * JumpingRopeExercise constructor.
     */
    public function __construct()
    {
        $this->name = 'Jumping Rope';
        $this->type = ActivityType::TYPE_CARDIO;
    }
}
