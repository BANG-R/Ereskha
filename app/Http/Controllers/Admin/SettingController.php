<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = \App\Models\Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);
        
        foreach ($data as $key => $value) {
            // Check if it's an uploaded file
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/settings'), $filename);
                $value = 'uploads/settings/' . $filename;
            }

            \App\Models\Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }

    public function resetLogo()
    {
        $setting = \App\Models\Setting::where('key', 'site_logo')->first();
        if ($setting) {
            // Delete file if exists
            if (file_exists(public_path($setting->value))) {
                @unlink(public_path($setting->value));
            }
            $setting->delete();
        }
        return redirect()->back()->with('success', 'Logo berhasil dikembalikan ke bawaan.');
    }
}
