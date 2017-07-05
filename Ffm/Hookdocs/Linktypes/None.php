<?php

namespace Ffm\Hookdocs\Linktypes;

class None implements LinkInterface
{
    protected $slug;

    /**
     * None constructor.
     * @param string $project
     * @param string $branch
     */
    public function __construct(string $project, string $branch)
    {
        $this->slug = "{$project}/src/{$branch}";
    }

    /**
     * returns a formatted URL
     * @param string $filePath
     * @param int $lineNr
     * @return string
     */
    public function getUrl(string $filePath, int $lineNr): string
    {
        return '#';
    }
}
