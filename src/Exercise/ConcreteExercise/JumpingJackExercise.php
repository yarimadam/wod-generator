<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Exercise\AbstractExercise;

/**
 * Class JumpingJackExercise
 * @package OneFit\Exercise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
final class JumpingJackExercise extends AbstractExercise implements ActivityInterface
{
    /**
     * JumpingJackExercise constructor.
     */
    public function __construct()
    {
        $this->name = 'Jumping Jack';
        $this->type = ActivityType::TYPE_CARDIO;
    }
}
