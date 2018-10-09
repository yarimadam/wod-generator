<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Exercise\AbstractExercise;

/**
 * Class HandstandPractiseExercise
 * @package OneFit\Exercise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
final class HandstandPractiseExercise extends AbstractExercise implements ActivityInterface
{
    /**
     * HandstandPractise constructor.
     */
    public function __construct()
    {
        $this->name = 'Handstand Practise';
        $this->type = ActivityType::TYPE_NONCARDIO;
    }
}
