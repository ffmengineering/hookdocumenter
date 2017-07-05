<?php

namespace Tests\Hookdocs;

use Ffm\Hookdocs\Linktypes\Bitbucket;
use PHPUnit\Framework\TestCase;

/**
 * @covers Bitbucket
 */
class BitbucketTest extends TestCase
{
    /**
     * @covers Bitbucket::getUrl()
     */
    public function testGetUrl()
    {
        $link = new Bitbucket('test/project', 'master');

        $this->assertEquals('https://bitbucket.org/test/project/src/master/path/to/file.php?fileviewer=file-view-default#file.php-50', $link->getUrl('path/to/file.php', 50));
    }
}