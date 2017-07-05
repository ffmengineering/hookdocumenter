<?php

namespace Ffm\Hookdocs\Magento1;

use Ffm\Hookdocs\Display\TableRow;
use phpDocumentor\Reflection\DocBlock\Tags\BaseTag;

class EventType implements TypeInterace
{
    use TypeTrait;

    const TAG_NAME = 'event';
    const HEADER_NAMES = ['Event', 'Location', 'Description'];

    /**
     * Creates a tablerow instance from the DocComment
     *
     * @return TableRow
     */
    public function __invoke(): TableRow
    {
        $namespace = explode('\\', $this->class->getNamespaceName());
        $namespace = array_slice($namespace, 0, 2);
        $module = implode('/', $namespace);

        /** @var BaseTag $eventTags */
        $tags = $this->docBlock->getTagsByName(self::TAG_NAME);
        $eventTags = reset($tags);

        return new TableRow(
            $eventTags->getDescription(),
            "{$module}::{$this->method->getName()}",
            $this->formatRepoUrl(),
            "{$this->docBlock->getSummary()} {$this->docBlock->getDescription()}"
        );
    }
}
