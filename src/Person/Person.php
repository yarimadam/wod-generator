<?php

namespace OneFit\Person;

/**
 * Class Person
 * @package OneFit\Person
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class Person
{
    /** @var string $name */
    protected $name;

    /** @var string $level */
    protected $level;

    /**
     * Person constructor.
     * @param string $name
     * @param string $level
     */
    public function __construct(string $name = '', string $level = '')
    {
        $this->setName($name);
        $this->setLevel($level);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function setLevel(string $level): void
    {
        if (PersonLevel::classConstantsContains($level)) {
            $this->level = $level;
        } else {
            throw new \InvalidArgumentException(sprintf('Person level "%s" is invalid.', $level));
        }
    }
}
