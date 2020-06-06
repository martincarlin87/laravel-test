<?php

namespace App\Models;

class RecursiveFileFinder
{

    private $directoryPath;
    private $results = [];
    private $needle = '0aH';

    public function __construct(string $directoryPath, ?string $needle = null)
    {
        $this->directoryPath = $directoryPath;

        // let the needle be customisable
        if (!empty($needle)) {
            $this->needle = $needle;
        }
    }

    public function find(): void
    {

        // loop through each directory recursively
        $directoryIterator = new \RecursiveDirectoryIterator($this->directoryPath, \RecursiveDirectoryIterator::SKIP_DOTS);
        $iterator = new \RecursiveIteratorIterator($directoryIterator);

        // https://regex101.com/r/mTW8zq/2
        $regex = sprintf("/^%s/", $this->needle);

        foreach ($iterator as $file) {

            if (preg_match($regex, $file->getFilename())) {
                // add file to the $results array
                $this->results[] = $file->getPathname();
            }

        }
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public function setNeedle(string $needle): void
    {
        $this->needle = $needle;
    }

}
