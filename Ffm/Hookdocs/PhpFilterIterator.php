<?php

namespace Ffm\Hookdocs;

class PhpFilterIterator extends \RecursiveFilterIterator
{

    public static $filters = [
        '.php',
    ];

    /**
     * @return bool
     */
    public function accept(): bool
    {
        return preg_match('/.php$/', $this->current()->getFilename());
    }

}