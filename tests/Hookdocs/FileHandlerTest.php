<?php

namespace Tests\Hookdocs;

use Ffm\Hookdocs\FileHandler;
use Ffm\Hookdocs\Linktypes\None;
use PHPUnit\Framework\TestCase;

/**
 * @covers FileHandler
 */
class FileHandlerTest extends TestCase
{
    /**
     * @covers FileHandler::getDocComments
     * @todo since getDocComments is too complex this test is quite useless. Needs refactoring
     */
    public function testGetDocComments()
    {
        $fileObject = $this->getMockBuilder('SplFileObject')
            ->setConstructorArgs(['/dev/null'])
            ->getMock();
        $fileObject->method('fread')
            ->willReturn('<?php
namespace Foo\Bar;

class Testclass
{
    /**
     * This is the description
     * @event order_save_before
     * @param Varien_Event_Observer $observer
     */
     public function testEvent($observer) {}
}
');
        $fileObject->method('getSize')
            ->willReturn(0);


        $linkObject = $this->createMock(None::class);

        $fileHandler = new FileHandler($fileObject, TypeMock::class, $linkObject);
        $comments = $fileHandler->getDocComments();

        $this->assertCount(0, $comments);
    }
}