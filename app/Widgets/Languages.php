<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Language;

class Languages extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $langs = Language::all();

        return view('widgets.languages', [
            'config' => $this->config,
            'langs' => $langs,
        ]);
    }
}
