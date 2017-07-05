<?php

namespace Tests\Hookdocs;

use Ffm\Hookdocs\Linktypes\None;
use PHPUnit\Framework\TestCase;

/**
 * @covers None
 */
class NoneTest extends TestCase
{
    /**
     * @covers None::getUrl()
     */
    public function testGetUrl()
    {
        $link = new None('test/project', 'master');

        $this->assertEquals('#', $link->getUrl('path/to/file.php', 50));
    }
}