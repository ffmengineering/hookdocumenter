<?php

namespace Ffm\Hookdocs;

use Ffm\Hookdocs\Display\TableRow;
use Ffm\Hookdocs\Linktypes\LinkInterface;
use phpDocumentor\Reflection\DocBlockFactory;
use PhpParser\Comment\Doc;
use PhpParser\Error;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\ParserFactory;

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
     * @return TableRow[]
     */
    public function getDocComments(): array
    {
        $contents = $this->file->fread($this->file->getSize());

        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        $factory = DocBlockFactory::createInstance();
        $tagsOutput = [];
        $namespace = '\\';

        try {
            $stmts = $parser->parse($contents);

            foreach ($stmts as $node) {
                if ($node instanceof Namespace_) {
                    $namespace = $node->name;
                }
                if ($node instanceof Class_) {
                    $classObject = new ClassObject($node->name, $namespace, $this->file->getRealPath());

                    foreach ($node->getMethods() as $methods) {
                        $method = null;
                        foreach ($methods->getAttributes() as $key => $attribute) {
                            if ($key === 'comments') {
                                try {
                                    $docblock = $factory->create($attribute[0]->getText());
                                } catch (\InvalidArgumentException $error) { // malformed DocComment
                                    continue;
                                }

                                $typeFactory = new $this->typeClass($method, $docblock, $classObject, $this->linkClass);
                                foreach ($docblock->getTagsByName($typeFactory::TAG_NAME) as $tag) {
                                    $tagsOutput[] =  $typeFactory();
                                }
                            }
                            if ($key === 'startLine') {
                                $method = new MethodObject($methods->name, $attribute);
                            }
                        }
                    }
                }
            }
            // $stmts is an array of statement nodes
        } catch (Error $e) {
            echo 'Parse Error: ', $e->getMessage();
            return [];
        }

        return $tagsOutput;
    }
}
