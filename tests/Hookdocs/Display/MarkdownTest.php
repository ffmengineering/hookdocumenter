<?php

namespace Tests\Hookdocs;

use Ffm\Hookdocs\Display\Markdown;
use Ffm\Hookdocs\Display\TableRow;
use PHPUnit\Framework\TestCase;

/**
 * @covers Markdown
 */
class MarkdownTest extends TestCase
{
    /**
     * @covers Markdown::getHeader()
     * @covers Markdown::getBody()
     * @covers Markdown::getFooter()
     */
    public function test()
    {
        $rows = [
            new TableRow('source1', 'method1', 'link1', 'description1')
        ];

        $display = new Markdown(['source', 'location', 'description'], $rows);

        $this->assertEquals('| source | location | description |'.PHP_EOL.'| --- |--- |--- |'.PHP_EOL, $display->getHeader());
        $this->assertEquals('| source1 | [method1](link1) | description1 |'.PHP_EOL, $display->getBody());
        $this->assertEquals('', $display->getFooter());
    }
}