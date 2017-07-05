<?php

namespace Ffm\Hookdocs\Magento1;

use Ffm\Hookdocs\Display\TableRow;
use Ffm\Hookdocs\Linktypes\LinkInterface;
use phpDocumentor\Reflection\DocBlock;

interface TypeInterace
{
    /**
     * EventType constructor.
     * @param \ReflectionMethod $method
     * @param DocBlock $docBlock
     * @param \ReflectionClass $class
     * @param LinkInterface $linkClass
     */
    public function __construct(\ReflectionMethod $method, DocBlock $docBlock, \ReflectionClass $class, LinkInterface $linkClass);

    /**
     * @return TableRow
     */
    public function __invoke(): TableRow;

    /**
     * Format a URL that links to the method and file in the project repository
     * @return string
     */
    public function formatRepoUrl(): string;
}