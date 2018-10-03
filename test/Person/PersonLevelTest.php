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
        $this->assertTrue(PersonLevel::isValid('expert'));
        $this->assertTrue(PersonLevel::isValid('beginner'));
    }

    public function testInvalidLevel()
    {
        $this->assertFalse(PersonLevel::isValid('rookie'));
    }
}
