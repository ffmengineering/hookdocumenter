<?php

namespace Ffm\Hookdocs;

class MethodObject
{
    protected $name;
    protected $startLine;

    /**
     * Method constructor.
     * @param string $name
     * @param int $startLine
     */
    public function __construct(string $name, int $startLine)
    {
        $this->name = $name;
        $this->startLine = $startLine;
    }

    /**
     * Get method name
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get method start line
     * @return int
     */
    public function getStartLine(): int
    {
        return $this->startLine;
    }
}
