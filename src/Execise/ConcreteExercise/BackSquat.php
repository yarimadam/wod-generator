<?php

namespace OneFit\Execise\ConcreteExercise;

use OneFit\Execise\AbstractExercise;
use OneFit\Execise\ExerciseType;

/**
 * Class BackSquat
 * @package OneFit\Execise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class BackSquat extends AbstractExercise
{
    /**
     * BackSquat constructor.
     */
    public function __construct()
    {
        $this->name = 'Back Squat';
        $this->type = ExerciseType::NONCARDIO;
    }
}
