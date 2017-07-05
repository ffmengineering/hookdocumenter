<?php

namespace Ffm\Hookdocs\Display;

class Markdown implements TableInterface
{
    protected $headers;
    protected $rows;

    /**
     * Markdown constructor.
     * @param array $headers
     * @param TableRow[] $rows
     */
    public function __construct(array $headers, array $rows)
    {
        $this->headers = $headers;
        $this->rows = $rows;
    }

    /**
     * Get the header of the table
     * @return string
     */
    public function getHeader(): string
    {
        return '| ' . implode(' | ', $this->headers) . ' |' . PHP_EOL .
            '| ' . str_repeat('--- |', count($this->headers)) . PHP_EOL;
    }

    /**
     * Get the body of the table
     * @return string
     */
    public function getBody(): string
    {
        $output = '';
        array_walk($this->rows, function ($row) use (&$output) {
            /** @var TableRow $row */
            $output .= '| ' . implode(' | ', $row->getCellValues($row::FORMAT_MARKDOWN)) . ' |' . PHP_EOL;
        });

        return $output;
    }

    /**
     * Get the footer of the table
     * @return string
     */
    public function getFooter(): string
    {
        return '';
    }
}
