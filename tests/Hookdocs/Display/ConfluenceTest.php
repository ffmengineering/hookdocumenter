<?php

namespace Tests\Hookdocs;

use Ffm\Hookdocs\Display\Confluence;
use Ffm\Hookdocs\Display\TableRow;
use PHPUnit\Framework\TestCase;

/**
 * @covers Confluence
 */
class ConfluenceTest extends TestCase
{
    /**
     * @covers Confluence::getHeader()
     * @covers Confluence::getBody()
     * @covers Confluence::getFooter()
     */
    public function test()
    {
        $rows = [
            new TableRow('source1', 'method1', 'link1', 'description1')
        ];

        $display = new Confluence(['source', 'location', 'description'], $rows);

        $this->assertEquals('||source||location||description||'.PHP_EOL, $display->getHeader());
        $this->assertEquals('|source1|[method1|link1]|description1|'.PHP_EOL, $display->getBody());
        $this->assertEquals('', $display->getFooter());
    }
}