<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Menu as CurrentMenu;

class MenuSortableWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'name' => 'admin',
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $menuTree = CurrentMenu::tree($this->config['name']);

        return view('widgets.menu_sortable_widget', [
            'config' => $this->config,
            'items' => $menuTree,
        ]);
    }


}
