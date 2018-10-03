<?php

namespace OneFit\Test\Person;

use OneFit\Person\Person;
use OneFit\Person\PersonLevel;
use PHPUnit\Framework\TestCase;

/**
 * Class PersonTest
 * @package OneFit\Test\Person
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class PersonTest extends TestCase
{
    public function testCreatePersonWithValidLevel()
    {
        $person = new Person('Foo Bar', PersonLevel::EXPERT);

        $this->assertEquals(PersonLevel::EXPERT, $person->getLevel());
    }

    public function testCreatePersonWithInvalidLevel()
    {
        $this->expectException('InvalidArgumentException');

        new Person('Foo Bar', 'rookie');
    }
}
