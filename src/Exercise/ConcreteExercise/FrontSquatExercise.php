<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Exercise\AbstractExercise;

/**
 * Class FrontSquatExercise
 * @package OneFit\Exercise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
final class FrontSquatExercise extends AbstractExercise implements ActivityInterface
{
    /**
     * FrontSquatExercise constructor.
     */
    public function __construct()
    {
        $this->name = 'Front Squat';
        $this->type = ActivityType::TYPE_NONCARDIO;
    }
}
