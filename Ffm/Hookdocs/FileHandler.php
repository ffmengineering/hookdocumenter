<?php

namespace Ffm\Hookdocs;

use Ffm\Hookdocs\Display\TableRow;
use Ffm\Hookdocs\Linktypes\LinkInterface;
use phpDocumentor\Reflection\DocBlockFactory;

class FileHandler
{
    protected $file;
    protected $typeClass;
    protected $linkClass;

    /**
     * FileHandler constructor.
     * @param \SplFileObject $file
     * @param string $typeClass
     * @param LinkInterface $linkClass
     */
    public function __construct(\SplFileObject $file, string $typeClass, LinkInterface $linkClass)
    {
        $this->file = $file;
        $this->typeClass = $typeClass;
        $this->linkClass = $linkClass;
    }

    /**
     * @param string $fileBody
     * @return string
     */
    public function getClassPath(string $fileBody): string
    {
        preg_match('/namespace\s([\w\\\]+)/', $fileBody, $namespaceMatches);
        preg_match('/class\s([\w_\r\n\s]+){/', $fileBody, $classMatches);

        $namespace = $namespaceMatches[1] ?? '';
        $class = $classMatches[1] ?? '';

        return $namespace . '\\' . trim($class);
    }

    /**
     * @return TableRow[]
     */
    public function getDocComments(): array
    {
        $contents = $this->file->fread($this->file->getSize());
        $classPath = $this->getClassPath($contents);

        $reflection = new \ReflectionClass($classPath);

        $factory = DocBlockFactory::createInstance();
        $tagsOutput = [];
        foreach ($reflection->getMethods() as $method) {
            if (!$method->getDocComment()) { // no DocComment presend
                continue;
            }

            $docblock = $factory->create($method->getDocComment());

            $typeFactory = new $this->typeClass($method, $docblock, $reflection, $this->linkClass);
            foreach ($docblock->getTagsByName($typeFactory::TAG_NAME) as $tag) {
                $tagsOutput[] =  $typeFactory();
            }
        }

        return $tagsOutput;
    }
}
