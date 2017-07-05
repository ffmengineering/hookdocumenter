<?php

namespace Ffm\Hookdocs\Magento1;

use Ffm\Hookdocs\ClassObject;
use Ffm\Hookdocs\Linktypes\LinkInterface;
use Ffm\Hookdocs\MethodObject;
use phpDocumentor\Reflection\DocBlock;

trait TypeTrait
{
    protected $method;
    protected $docBlock;
    protected $class;
    protected $linkClass;

    /**
     * EventType constructor.
     * @param MethodObject $method
     * @param DocBlock $docBlock
     * @param ClassObject $class
     * @param LinkInterface $linkClass
     */
    public function __construct(MethodObject $method, DocBlock $docBlock, ClassObject $class, LinkInterface $linkClass)
    {
        $this->method = $method;
        $this->docBlock = $docBlock;
        $this->class = $class;
        $this->linkClass = $linkClass;
    }

    /**
     * Format a URL that links to the method and file in the project repository
     * @return string
     */
    public function formatRepoUrl(): string
    {
        $rootDir = realpath(DOCUMENTER_PROJECT_ROOT_DIR) . '/';
        $filePath = str_replace($rootDir, '', $this->class->getFileName());

        return $this->linkClass->getUrl($filePath, $this->method->getStartLine());
    }
}
