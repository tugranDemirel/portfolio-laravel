<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data = $this->fileControl($data);
        $data['slug'] = Str::slug($data['title']);
        $save = Setting::create($data);
        if ($save)
            return redirect()->back()->with('success', 'Ayarlar başarıyla güncellendi');
        else
            return redirect()->back()->with('error', 'Ayarlar güncellenirken bir hata oluştu');
    }
    public function update(Request $request, $type)
    {
        $data = $request->except('_token');
        $this->fileDelete($data);
        $data = $this->fileControl($data);
        $data['slug'] = Str::slug($data['title']);
        $save = Setting::where('id', $type)->update($data);
        if ($save)
            return redirect()->back()->with('success', 'Ayarlar başarıyla güncellendi');
        else
            return redirect()->back()->with('error', 'Ayarlar güncellenirken bir hata oluştu');
    }

    protected function fileControl($data)
    {
        isset($data['logo']) && $data['logo'] ?  $data['logo'] = ImageHelper::uploadImage($data['logo'], 'setting') : null;
        isset($data['favicon']) && $data['favicon'] ?  $data['favicon'] = ImageHelper::uploadImage($data['favicon'], 'setting') : null;
        isset($data['image']) && $data['image'] ?  $data['image'] = ImageHelper::uploadImage($data['image'], 'setting') : null;
        isset($data['file']) && $data['file'] ?  $data['file'] = ImageHelper::uploadImage($data['file'], 'setting') : null;
        return $data;
    }
}
