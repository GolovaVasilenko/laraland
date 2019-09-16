<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\MenuItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menu.index', [
            'menus' => Menu::all(),
        ]);
    }

    public function create()
    {
        return view('admin.menu.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Menu::create(['name' => $request->get('name')]);

        return redirect()->route('menu.list')
            ->with(['flash_message' => trans('menu.add_success_message')]);
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('admin.menu.edit', ['menu' => $menu]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $menu = Menu::find($request->get('id'));
        $menu->name = $request->get('name');
        $menu->save();
        return redirect()->route('menu.edit', [
            'id' => $request->get('id')
        ])->with(['flash_message' => trans('menu.edit_success_message')]);
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('menu.list')
            ->with(['flash_message' => trans('menu.delete_success_message')]);
    }

    public function itemsList($menu_id)
    {
        $menu = Menu::tree('test menu 123');

        return view('admin.menu.items', [
            'items' => MenuItems::where('menu_id', $menu_id)
                ->where('lang', \App::getLocale())
                ->get(),
            'menu' => Menu::where('id', $menu_id)->first(),
        ]);
    }

    public function sortable(Request $request)
    {
        if($request->ajax()) {
            $items = json_decode($request->get('output'));
            //dd($items);
            $this->setPosition($items);
        }
    }

    private function setPosition($arrayData, $parent = 0)
    {
        $count = 1;
        foreach($arrayData as $item) {
            $model = MenuItems::find($item->id);
            $model->position = $count++;
            $model->parent_id = $parent;

            $model->save();
            if(isset($item->children)) {
                $this->setPosition($item->children, $item->id);
            }
        }
    }

    public function itemStore(Request $request)
    {
        $request->validate([
            'link' => 'required',
            'label' => 'required',
        ]);

        $items = MenuItems::create($request->all());

        return redirect()->route('menu.items', [
            'menu_id' => $items->menu_id
        ]);

    }

    public function itemEdit($id)
    {
        $item = MenuItems::find($id);

        return view('admin.menu.item_edit', ['item' => $item]);
    }

    public function itemUpdate(Request $request)
    {
        $request->validate([
            'link' => 'required',
            'label' => 'required',
        ]);

        $item = MenuItems::find($request->get('id'));
        $item->label = $request->get('label');
        $item->link = $request->get('link');
        $item->save();

        return redirect()->route('menu.items', ['id' => $item->menu_id])
            ->with(['flash_message' => trans('menu.item_edit_success_message')])
    }

    public function itemDelete($id)
    {

    }
}
