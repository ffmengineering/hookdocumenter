<?php

namespace Tests\Hookdocs;

use Ffm\Hookdocs\Display\TableRow;

class TypeMock
{
    public function __construct($method, $docBlock, $class, $linkClass)
    {}

    public function __invoke(): TableRow
    {
        return new TableRow(
            'source',
            'location',
            'link',
            'description'
        );
    }
}