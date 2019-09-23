<?php

namespace App\Widgets;

use App\Menu as CurrentMenu;
use Spatie\Menu\Html;
use Spatie\Menu\Laravel\Facades\Menu;
use Spatie\Menu\Link;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Route;

class MenuAdminWidget extends AbstractWidget
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

        Menu::macro('menuAdmin', function () use ($menuTree) {
            $menu = Menu::new();
            $menu->setAttributes(['data-widget' => 'treeview', 'role' => 'menu', 'data-accordion' => 'false']);
            $menu->addClass('nav nav-pills nav-sidebar flex-column');
            foreach($menuTree as $menuItem) {
                $menu->add(Link::to($menuItem['link'], $menuItem['label'])
                    ->addClass('nav-link')
                    ->addParentClass('nav-item'));
                if(!empty($menuItem['children'])) {
                    $submenu = Menu::new();
                    $submenu->addClass('children');
                    foreach($menuItem['children'] as $menuChildren) {
                        $submenu->add(Link::to($menuChildren['link'], $menuChildren['label'])
                            ->addClass('nav-link')
                            ->addParentClass('nav-item has-treeview'));
                        $submenu->addClass('nav nav-treeview');
                    }
                    $menu->submenu(
                        Link::to($menuItem['link'], $menuItem['label']),
                        $submenu
                    );
                }
                $menu->setActive(Route::getFacadeRoot()->current()->uri())
                    ->setActiveClassOnLink();
            }

            return $menu;
        });

        return view('widgets.menu_admin_widget', [
            'config' => $this->config,
        ]);
    }
}
