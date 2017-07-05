<?php

namespace Ffm\Hookdocs\Linktypes;

interface LinkInterface
{

    public function __construct(string $project, string $branch);

    /**
     * returns a formatted URL
     * @param string $filePath
     * @param int $lineNr
     * @return string
     */
    public function getUrl(string $filePath, int $lineNr): string;
}