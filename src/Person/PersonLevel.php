<?php

namespace OneFit\Person;

/**
 * Class PersonLevel
 * @package OneFit\Person
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class PersonLevel
{
    const EXPERT = 'expert';
    const BEGINNER = 'beginner';

    /**
     * Check if given level is valid one.
     * @param string $level
     * @return bool
     */
    public static function isValid($level): bool
    {
        $constants = self::getConstants();
        if ($constants) {
            return in_array($level, $constants);
        }
        return false;
    }

    /**
     * Returns class constants
     * @return array
     */
    private static function getConstants(): array
    {
        try {
            $reflectionClass = new \ReflectionClass(self::class);
        } catch (\Exception $e) {
            // TODO: Do something with the caught exception
            return [];
        }
        return $reflectionClass->getConstants();
    }
}
