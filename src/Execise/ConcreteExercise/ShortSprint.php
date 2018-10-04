<?php

namespace OneFit\Execise\ConcreteExercise;

use OneFit\Execise\AbstractExercise;
use OneFit\Execise\ExerciseType;

/**
 * Class ShortSprint
 * @package OneFit\Execise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class ShortSprint extends AbstractExercise
{
    /**
     * ShortSprint constructor.
     */
    public function __construct()
    {
        $this->name = 'Short Sprint';
        $this->type = ExerciseType::CARDIO;
    }
}
