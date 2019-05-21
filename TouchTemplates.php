<?php

namespace Statamic\Addons\TouchTemplates;

use Statamic\API\Config;
use Statamic\API\Str;

class TouchTemplates
{
    /**
     * List all files to touch
     */
    public function getFilesToTouch()
    {
        $directory = new \RecursiveDirectoryIterator($this->getThemePath());
        $iterator = new \RecursiveIteratorIterator($directory);
        $regex = new \RegexIterator($iterator, '/^.+\.html$/i', \RecursiveRegexIterator::MATCH);

        return $regex;
    }

    /**
     * Touch array of files
     */
    public function touchFiles($files = [])
    {
        foreach ($files as $file) {
            $this->touchFile($file->getPathname());
        }
    }

    /**
     * Touch single file
     */
    private function touchFile($file = '')
    {
        if ('' === $file) {
            throw new \Exception('Filepath is empty');
        }

        \touch($file);
    }

    /**
     * Current theme path
     */
    private function getThemePath()
    {
        $path = Config::get('system.filesystems.themes.url').'/'.Config::get('theming.theme');
        return Str::ensureLeft($path, './');
    }
}
