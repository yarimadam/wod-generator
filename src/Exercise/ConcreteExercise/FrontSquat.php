<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Exercise\AbstractExercise;
use OneFit\Exercise\ExerciseType;

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
