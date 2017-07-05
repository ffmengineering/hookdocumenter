<?php

namespace Tests\Hookdocs;

use Ffm\Hookdocs\Display\Html;
use Ffm\Hookdocs\Display\TableRow;
use PHPUnit\Framework\TestCase;

/**
 * @covers Html
 */
class HtmlTest extends TestCase
{
    /**
     * @covers Html::getHeader()
     * @covers Html::getBody()
     * @covers Html::getFooter()
     */
    public function test()
    {
        $rows = [
            new TableRow('source1', 'method1', 'link1', 'description1')
        ];

        $display = new Html(['source', 'location', 'description'], $rows);

        $this->assertEquals('<table><thead><tr><th>source</th><th>location</th><th>description</th></tr></thead>', $display->getHeader());
        $this->assertEquals('<tbody><tr><td>source1</td><td><a href="link1">method1</a></td><td>description1</td></tr></tbody>', $display->getBody());
        $this->assertEquals('<table>', $display->getFooter());
    }
}