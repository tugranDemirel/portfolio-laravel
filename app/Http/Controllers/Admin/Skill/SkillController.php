<?php

namespace App\Http\Controllers\Admin\Skill;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skill.index' , compact('skills'));
    }

    public function create()
    {
        return view('admin.skill.create-edit');
    }

    public function store(SkillRequest $request)
    {
        $data = $request->except('_token');
        $data = $this->prepareData($data);
        $save = Skill::create($data);
        if ($save) {
            return redirect()->back()->with('success', $data['name'].' başarıyla eklendi.');
        }
        return redirect()->back()->with('error', 'Bir hata oluştu.');
    }

    public function edit(Skill $skill, $type)
    {
        $skill = Skill::where('id', $type)->first();
        return view('admin.skill.create-edit', compact('skill'));
    }

    public function update(SkillRequest $request, $type)
    {
        $data = $request->except('_token');
        $data = $this->prepareData($data);
        $update = Skill::where('id', $type)->update($data);
        if ($update) {
            return redirect()->back()->with('success', $data['name'].' başarıyla güncellendi.');
        }
        return redirect()->back()->with('error', 'Bir hata oluştu.');
    }

    public function destroy($type)
    {
        $delete = Skill::where('id', $type)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Başarıyla silindi.');
        }
        return redirect()->back()->with('error', 'Bir hata oluştu.');
    }

    private function prepareData($data)
    {
        $data['start_date'] = date('Y-m-d', strtotime($data['start_date']));
        return $data;
    }
}
