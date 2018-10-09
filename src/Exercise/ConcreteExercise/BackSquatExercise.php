<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Exercise\AbstractExercise;

/**
 * Class BackSquatExercise
 * @package OneFit\Exercise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
final class BackSquatExercise extends AbstractExercise implements ActivityInterface
{
    /**
     * BackSquatExercise constructor.
     */
    public function __construct()
    {
        $this->name = 'Back Squat';
        $this->type = ActivityType::TYPE_NONCARDIO;
    }
}
