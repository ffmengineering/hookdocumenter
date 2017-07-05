<?php

namespace Ffm\Hookdocs\Magento1;

use Ffm\Hookdocs\ClassObject;
use Ffm\Hookdocs\Display\TableRow;
use Ffm\Hookdocs\Linktypes\LinkInterface;
use Ffm\Hookdocs\MethodObject;
use phpDocumentor\Reflection\DocBlock;

interface TypeInterace
{
    /**
     * EventType constructor.
     * @param MethodObject $method
     * @param DocBlock $docBlock
     * @param ClassObject $class
     * @param LinkInterface $linkClass
     */
    public function __construct(MethodObject $method, DocBlock $docBlock, ClassObject $class, LinkInterface $linkClass);

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