<?php

namespace Ffm\Hookdocs\Display;

class TableRow
{
    const FORMAT_HTML = 1;
    const FORMAT_MARKDOWN = 2;
    const FORMAT_CONFLUENCE = 3;

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
     * Format the row values
     *
     * @param int $format
     * @return array
     */
    public function getCellValues(int $format = 0): array
    {
        return [trim($this->source), $this->getLink($format), $this->getDescription()];
    }

    /**
     * @param int $format
     * @return string
     */
    public function getLink(int $format): string
    {
        switch ($format) {
            case self::FORMAT_HTML:
                $link = "<a href=\"{$this->link}\">{$this->method}</a>";
                break;
            case self::FORMAT_MARKDOWN:
                $link = "[{$this->method}]({$this->link})";
                break;
            case self::FORMAT_CONFLUENCE:
                $link = "[{$this->method}|{$this->link}]";
                break;
            default:
                $link = $this->method;
                break;
        }

        return $link;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        $description = trim($this->description);
        if (!strlen($description)) {
            $description = 'N/A';
        }

        return $description;
    }
}
