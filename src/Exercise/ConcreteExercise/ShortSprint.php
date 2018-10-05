<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Exercise\AbstractExercise;
use OneFit\Exercise\ExerciseType;

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
