<?php

namespace Ffm\Hookdocs\Display;

interface TableInterface
{
    /**
     * Markdown constructor.
     * @param array $headers
     * @param TableRow[] $rows
     */
    public function __construct(array $headers, array $rows);

    /**
     * Get the header of the table
     * @return string
     */
    public function getHeader(): string;

    /**
     * Get the body of the table
     * @return string
     */
    public function getBody(): string;

    /**
     * Get the footer of the table
     * @return string
     */
    public function getFooter(): string;
}