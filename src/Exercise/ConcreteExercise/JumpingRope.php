<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Exercise\AbstractExercise;
use OneFit\Exercise\ExerciseType;

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
