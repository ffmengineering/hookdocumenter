<?php

namespace Ffm\Hookdocs\Linktypes;

class Github implements LinkInterface
{
    protected $slug;
    protected $filePath;
    protected $lineNr;

    public function __construct(string $project, string $branch)
    {
        $this->slug = "{$project}/blob/{$branch}";
    }

    /**
     * returns a formatted URL
     * @param string $filePath
     * @param int $lineNr
     * @return string
     */
    public function getUrl(string $filePath, int $lineNr): string
    {
        return "https://github.com/{$this->slug}/{$filePath}#L{$lineNr}";
    }
}
