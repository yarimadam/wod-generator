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
     * @return string[]
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

    public static function classConstantsContains(string $value): bool
    {
        $constants = self::getClassConstants();
        if ($constants) {
            return in_array($value, $constants);
        }
        return false;
    }

    public static function dateIntervalToSeconds(DateInterval $dateInterval): int
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
