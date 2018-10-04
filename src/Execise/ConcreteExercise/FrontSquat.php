<?php

namespace OneFit\Execise\ConcreteExercise;

use OneFit\Execise\AbstractExercise;
use OneFit\Execise\ExerciseType;

/**
 * Class FrontSquat
 * @package OneFit\Execise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class FrontSquat extends AbstractExercise
{
    /**
     * FrontSquat constructor.
     */
    public function __construct()
    {
        $this->name = 'Back Squat';
        $this->type = ExerciseType::NONCARDIO;
    }
}
