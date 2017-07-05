<?php

namespace Ffm\Hookdocs\Display;

class TableRow
{
    protected $source;
    protected $method;
    protected $link;
    protected $description;

    /**
     * MdTableRow constructor.
     *
     * @param string $source
     * @param string $method
     * @param string $link
     * @param string $description
     */
    public function __construct(string $source, string $method, string $link, string $description)
    {
        $this->source = $source;
        $this->method = $method;
        $this->link = $link;
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getCellValues(): array
    {
        return [
            $this->source,
            "[{$this->method}]({$this->link})",
            $this->description,
        ];
    }
}
