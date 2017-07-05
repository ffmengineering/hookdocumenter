<?php

namespace Ffm\Hookdocs;

class ClassObject
{
    protected $name;
    protected $namespace;
    protected $fileName;

    /**
     * ClassObject constructor.
     * @param string $name
     * @param string $namespace
     * @param string $fileName
     */
    public function __construct(string $name, string $namespace, string $fileName)
    {
        $this->name = $name;
        $this->namespace = $namespace;
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNamespaceName(): string
    {
        return $this->namespace;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }
}
