<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Spatie\Menu\Laravel\Facades\Menu;
use Spatie\Menu\Link;
use App\Menu as CurrentMenu;

class MenuSortableWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'name' => 'Admin',
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $menuTree = CurrentMenu::tree($this->config['name']);
        /*Menu::macro('menuSortable', function () use ($menuTree) {
            $menu = Menu::new();
            $menu->addClass('dd-list');
            foreach($menuTree as $menuItem) {
                $menu->link($menuItem['link'], $menuItem['label']);
                if(isset($menuItem['children'])) {
                    $submenu = Menu::new();
                    $submenu->addClass('children');
                    foreach($menuItem['children'] as $menuChildren) {
                        $submenu->link($menuChildren['link'], $menuChildren['label']);

                    }
                    $menu->submenu(
                        Link::to($menuItem['link'], $menuItem['label']),
                        $submenu
                    );
                }
            }

            return $menu;
        });*/

        return view('widgets.menu_sortable_widget', [
            'config' => $this->config,
            'items' => $menuTree,
        ]);
    }


}
