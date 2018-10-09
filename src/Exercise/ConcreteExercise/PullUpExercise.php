<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Exercise\AbstractExercise;

/**
 * Class PullUpExercise
 * @package OneFit\Exercise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
final class PullUpExercise extends AbstractExercise implements ActivityInterface
{
    /**
     * PullUpExercise constructor.
     */
    public function __construct()
    {
        $this->name = 'Pull Up';
        $this->type = ActivityType::TYPE_NONCARDIO;
    }
}
