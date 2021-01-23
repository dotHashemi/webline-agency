<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use App\Models\Option;

class SettingController extends AdminController
{
    public function edit()
    {
        $setting = Option::where('key', 'LIKE', 'set-%')->get();
        $setting = $setting->pluck('value', 'key');

        return view('admin.setting', compact('setting'));
    }


    public function update(SettingRequest $request)
    {
        $input = $request->only(
            'set-slider',
            'set-social-whatsapp',
            'set-social-instagram',
            'set-email',
            'set-phone'
        );

        if (isset($input['set-slider']))
            $this->UpdateOption('set-slider', $input['set-slider']);

        if (isset($input['set-social-whatsapp']))
            $this->UpdateOption('set-social-whatsapp', $input['set-social-whatsapp']);

        if (isset($input['set-social-instagram']))
            $this->UpdateOption('set-social-instagram', $input['set-social-instagram']);

        if (isset($input['set-email']))
            $this->UpdateOption('set-email', $input['set-email']);

        if (isset($input['set-phone']))
            $this->UpdateOption('set-phone', $input['set-phone']);

        alert()->success($this->alerts['update']);
        return redirect()->route('admin.setting.edit');
    }


    private function UpdateOption($key, $value, $tags = null)
    {
        $option = Option::where('key', $key)->first();

        if ($option) {
            $option->update([
                'key'   => $key,
                'value' => $value,
                'tags'  => $tags
            ]);
        } else {
            Option::create([
                'key'   => $key,
                'value' => $value,
                'tags'  => $tags
            ]);
        }

        return;
    }


    public function reset()
    {
        $default = [
            [
                'key' => 'set-slider',
                'value' => '0',
                'tags' => null
            ],
            [
                'key' => 'set-social-whatsapp',
                'value' => ' ',
                'tags' => null
            ],
            [
                'key' => 'set-social-instagram',
                'value' => ' ',
                'tags' => null
            ],
            [
                'key' => 'set-email',
                'value' => ' ',
                'tags' => null
            ],
            [
                'key' => 'set-phone',
                'value' => ' ',
                'tags' => null
            ]
        ];
        $temp = Option::where('key', 'LIKE', 'set-%')->delete();

        Option::insert($default);

        alert()->success($this->alerts['update']);
        return redirect()->route('admin.setting.edit');
    }
}
