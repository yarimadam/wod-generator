<?php

namespace OneFit\Execise\ConcreteExercise;

use OneFit\Execise\AbstractExercise;
use OneFit\Execise\ExerciseType;

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
