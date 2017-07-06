<?php

namespace Tests\Hookdocs;

use Ffm\Hookdocs\Display\TableRow;
use PHPUnit\Framework\TestCase;

/**
 * @covers TableRow
 */
class TableRowTest extends TestCase
{
    /**
     * @covers TableRow::getCellValues()
     */
    public function testGetCellValues()
    {
        $row = new TableRow('source', 'method', 'link', 'description');

        $this->assertEquals(['source','<a href="link">method</a>','description',], $row->getCellValues($row::FORMAT_HTML));
        $this->assertEquals(['source','[method](link)','description',], $row->getCellValues($row::FORMAT_MARKDOWN));
        $this->assertEquals(['source','[method|link]','description',], $row->getCellValues($row::FORMAT_CONFLUENCE));
        $this->assertEquals(['source','method','description',], $row->getCellValues());
    }
}