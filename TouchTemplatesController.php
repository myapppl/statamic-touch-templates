<?php

namespace Statamic\Addons\TouchTemplates;

use Statamic\Extend\Controller;
use Log;

class TouchTemplatesController extends Controller
{
    private $touchTemplates;

    /**
     * Initialize controller
     */
    public function init()
    {
        $this->touchTemplates = new TouchTemplates();
    }

    /**
     * Touch files
     */
    public function getTouchFiles()
    {
        try {
            $files = $this->touchTemplates->getFilesToTouch();
            $this->touchTemplates->touchFiles($files);
            Log::info('Files touched successfully: '.date('d.m.Y H:i', \time()));
            return back()->with('success', 'Files touched successfully');
        } catch (\Exception $e) {
            Log::error('There was an error while touching the files: '.$e->getMessage());
            return back()->withErrors('error', 'There was an error while touching the files: '.$e->getMessage());
        }
    }

}
