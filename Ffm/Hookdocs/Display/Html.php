<?php

namespace Ffm\Hookdocs\Display;

class Html implements TableInterface
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
        return '<table>' .
            '<thead><tr><th>' . implode('</th><th>', $this->headers) . '</th></tr></thead>';
    }

    /**
     * Get the body of the table
     * @return string
     */
    public function getBody(): string
    {
        $output = '<tbody>';
        array_walk($this->rows, function($row) use (&$output) {
            /** @var TableRow $row */
            $output .= '<tr><td>' . implode('</td><td>', $row->getCellValues($row::FORMAT_HTML)) . '</td></tr>';
        });

        return $output . '</tbody>';
    }

    /**
     * Get the footer of the table
     * @return string
     */
    public function getFooter(): string
    {
        return '<table>';
    }
}
