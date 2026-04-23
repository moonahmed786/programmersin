<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the settings.
     */
    public function index()
    {
        $settings = Setting::all()->groupBy('group');

        // Define default groups if empty to ensure UI renders
        if ($settings->isEmpty()) {
            $settings = collect([
                'general' => collect([]),
                'seo' => collect([]),
                'social' => collect([]),
                'contact' => collect([]),
            ]);
        }

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update the specified settings in storage.
     */
    public function update(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            $setting = Setting::where('key', $key)->first();

            if (!$setting) {
                continue;
            }

            if ($setting->type === 'file' && $request->hasFile($key)) {
                // Delete old file if exists
                if ($setting->value) {
                    Storage::disk('public')->delete($setting->value);
                }

                $path = $request->file($key)->store('settings', 'public');
                $setting->update(['value' => $path]);
            } else {
                $setting->update(['value' => $value]);
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
