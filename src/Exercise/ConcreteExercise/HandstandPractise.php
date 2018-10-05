<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Exercise\AbstractExercise;
use OneFit\Exercise\ExerciseType;

/**
 * Class HandstandPractise
 * @package OneFit\Execise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class HandstandPractise extends AbstractExercise
{
    /**
     * HandstandPractise constructor.
     */
    public function __construct()
    {
        $this->name = 'Handstand Practise';
        $this->type = ExerciseType::NONCARDIO;
    }
}
