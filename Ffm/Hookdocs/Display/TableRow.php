<?php

namespace Ffm\Hookdocs\Display;

class TableRow
{
    const FORMAT_HTML = 1;
    const FORMAT_MARKDOWN = 2;

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
     * @param int $format
     * @return array
     */
    public function getCellValues(int $format = 0): array
    {
        switch ($format) {
            case self::FORMAT_HTML:
                $link = "<a href=\"{$this->link}\">{$this->method}</a>";
                break;
            case self::FORMAT_MARKDOWN:
                $link = "[{$this->method}]({$this->link})";
                break;
            default:
                $link = $this->method;
                break;
        }

        return [$this->source, $link, $this->description];
    }
}
