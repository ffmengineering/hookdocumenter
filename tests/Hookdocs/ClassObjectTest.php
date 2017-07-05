<?php

namespace Tests\Hookdocs;

use Ffm\Hookdocs\ClassObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers ClassObject
 */
class ClassObjectTest extends TestCase
{
    /**
     * @covers ClassObject::getName()
     * @covers ClassObject::getNamespaceName()
     * @covers ClassObject::getFileName()
     */
    public function testGetters()
    {
        $class = new ClassObject('classname', 'Foo\Bar', '/path/to/file');

        $this->assertEquals('classname', $class->getName());
        $this->assertEquals('Foo\Bar', $class->getNamespaceName());
        $this->assertEquals('/path/to/file', $class->getFileName());
    }
}