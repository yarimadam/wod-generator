<?php

namespace OneFit\Execise\ConcreteExercise;

use OneFit\Execise\AbstractExercise;
use OneFit\Execise\ExerciseType;

/**
 * Class Ring
 * @package OneFit\Execise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class Ring extends AbstractExercise
{
    /**
     * Ring constructor.
     */
    public function __construct()
    {
        $this->name = 'Ring';
        $this->type = ExerciseType::NONCARDIO;
    }
}
