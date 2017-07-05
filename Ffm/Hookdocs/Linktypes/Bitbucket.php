<?php

namespace Ffm\Hookdocs\Linktypes;

class Bitbucket implements LinkInterface
{
    protected $slug;
    protected $filePath;
    protected $lineNr;

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
        $fileName = basename($filePath);

        return "https://bitbucket.org/{$this->slug}/" .
            "{$filePath}?fileviewer=file-view-default#" .
            "{$fileName}-{$lineNr}";
    }
}
