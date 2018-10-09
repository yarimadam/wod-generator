<?php

namespace OneFit;

use DateInterval;
use DateTimeImmutable;

/**
 * Trait DomainUtilsTrait
 * @package OneFit
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
trait DomainUtilsTrait
{
    /**
     * Returns class constants.
     * @return array
     */
    private static function getClassConstants(): array
    {
        try {
            $reflectionClass = new \ReflectionClass(self::class);
        } catch (\Exception $e) {
            // TODO: Do something with the caught exception
            return [];
        }
        return $reflectionClass->getConstants();
    }

    /**
     * Check if given value exists in class constants.
     * @param string $value
     * @return bool
     */
    public static function classConstantsContains($value): bool
    {
        $constants = self::getClassConstants();
        if ($constants) {
            return in_array($value, $constants);
        }
        return false;
    }

    /**
     * @param DateInterval $dateInterval
     * @return int seconds
     */
    public static function dateIntervalToSeconds(DateInterval $dateInterval)
    {
        try {
            $reference = new DateTimeImmutable();
            $endTime = $reference->add($dateInterval);
            return $endTime->getTimestamp() - $reference->getTimestamp();
        } catch (\Exception $e) {
            return 0;
        }
    }
}
