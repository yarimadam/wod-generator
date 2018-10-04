<?php

namespace OneFit\Execise;

/**
 * Class Exercise
 * @package OneFit\Execise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
abstract class AbstractExercise
{
    /** @var string $name */
    protected $name;

    /** @var string $type */
    protected $type;

    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @return string */
    public function getType(): string
    {
        return $this->type;
    }

    /** @return bool */
    public function isCardio(): bool
    {
        return ($this->type === ExerciseType::CARDIO);
    }
}
