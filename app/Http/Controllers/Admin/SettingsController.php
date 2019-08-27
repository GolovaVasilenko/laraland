<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends DashboardController
{
    public function index()
    {
        return view('admin.settings.index',
            [
                'settings' => Settings::all(),
                'groups' => Settings::getGroups(),
                'types' => Settings::getTypes(),
                'title_page' => trans('settings.settings_title_page'),
            ]
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'label' => 'required',
            'key' => 'required',
            'value' => 'required',
        ]);

        Settings::create($request->all());
        return redirect()->route('settings.list');
    }

    public function edit($id)
    {
        return view('admin.settings.edit', [
            'setting' => Settings::find($id),
            'groups' => Settings::getGroups(),
            'types' => Settings::getTypes(),
            'title_page' => trans('settings.settings_title_page'),
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'label' => 'required',
            'key' => 'required',
            'value' => 'required',
        ]);

        Settings::where('id', $request->get('id'))
        ->update([
            'lang'  => $request->get('lang') ? : App::getLocale(),
            'key'   => $request->get('key'),
            'value' => $request->get('value'),
            'label' => $request->get('label'),
            'group' => $request->get('group'),
            'type'  => $request->get('type'),
        ]);
        return redirect()->route('settings.list');
    }

    public function remove($id)
    {
        $model = Settings::find($id);
        $model->delete();
        return redirect()->route('settings.list');
    }
}
