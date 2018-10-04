<?php

namespace OneFit\Execise\ConcreteExercise;

use OneFit\Execise\AbstractExercise;
use OneFit\Execise\ExerciseType;

/**
 * Class JumpingJack
 * @package OneFit\Execise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class JumpingJack extends AbstractExercise
{
    /**
     * JumpingJack constructor.
     */
    public function __construct()
    {
        $this->name = 'Jumping Jack';
        $this->type = ExerciseType::CARDIO;
    }
}
