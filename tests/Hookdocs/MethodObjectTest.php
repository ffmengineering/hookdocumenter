<?php

namespace Tests\Hookdocs;

use Ffm\Hookdocs\MethodObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers MethodObject
 */
class MethodObjectTest extends TestCase
{
    /**
     * @covers MethodObject::getName()
     * @covers MethodObject::getStartLine()
     */
    public function testGetters()
    {
        $method = new MethodObject('methodname', 10);

        $this->assertEquals('methodname', $method->getName());
        $this->assertEquals(10, $method->getStartLine());
    }
}