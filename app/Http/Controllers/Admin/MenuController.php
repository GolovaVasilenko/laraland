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
        return view('admin.menu.items', [
            'items' => MenuItems::where('menu_id', $menu_id)
                ->where('lang', \App::getLocale())
                ->get(),
            'menu' => Menu::where('id', $menu_id)->first(),
        ]);
    }

    public function itemCreate($menu_id)
    {
        return view('admin.menu.item_add', [
            'items' => MenuItems::where('menu_id', $menu_id)
                ->where('lang', \App::getLocale())
                ->get(),
            'menu' => Menu::where('id', $menu_id)->first(),
        ]);
    }

    public function itemStore(Request $request)
    {

    }

    public function itemEdit($id)
    {

    }

    public function itemUpdate(Request $request)
    {

    }

    public function itemDelete($id)
    {

    }
}
