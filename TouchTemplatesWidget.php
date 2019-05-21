<?php

namespace Statamic\Addons\TouchTemplates;

use Statamic\Extend\Widget;

class TouchTemplatesWidget extends Widget
{
    private $touchTemplates;

    public function init()
    {
        $this->touchTemplates = new TouchTemplates();
    }

    /**
     * The HTML that should be shown in the widget
     *
     * @return string
     */
    public function html()
    {
        $files = $this->touchTemplates->getFilesToTouch();
        return $this->view('widget', \compact('files'))->render();
    }
}
