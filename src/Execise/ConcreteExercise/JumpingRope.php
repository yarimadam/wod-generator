<?php

namespace OneFit\Execise\ConcreteExercise;

use OneFit\Execise\AbstractExercise;
use OneFit\Execise\ExerciseType;

/**
 * Class JumpingRope
 * @package OneFit\Execise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class JumpingRope extends AbstractExercise
{
    /**
     * JumpingRope constructor.
     */
    public function __construct()
    {
        $this->name = 'Jumping Rope';
        $this->type = ExerciseType::CARDIO;
    }
}
