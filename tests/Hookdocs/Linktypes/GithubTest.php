<?php

namespace Tests\Hookdocs;

use Ffm\Hookdocs\Linktypes\Github;
use PHPUnit\Framework\TestCase;

/**
 * @covers Github
 */
class GithubTest extends TestCase
{
    /**
     * @covers Github::getUrl()
     */
    public function testGetUrl()
    {
        $link = new Github('test/project', 'master');

        $this->assertEquals('https://github.com/test/project/blob/master/path/to/file.php#L50', $link->getUrl('path/to/file.php', 50));
    }
}