<?php

namespace OneFit\Test\Person;

use OneFit\Person\PersonLevel;
use PHPUnit\Framework\TestCase;

/**
 * Class PersonLevelTest
 * @package OneFit\Test\Person
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class PersonLevelTest extends TestCase
{
    public function testValidLevel()
    {
        $this->assertTrue(PersonLevel::classConstantsContains('expert'));
        $this->assertTrue(PersonLevel::classConstantsContains('beginner'));
    }

    public function testInvalidLevel()
    {
        $this->assertFalse(PersonLevel::classConstantsContains('rookie'));
    }
}
