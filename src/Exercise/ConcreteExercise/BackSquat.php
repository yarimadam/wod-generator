<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Exercise\AbstractExercise;
use OneFit\Exercise\ExerciseType;

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
