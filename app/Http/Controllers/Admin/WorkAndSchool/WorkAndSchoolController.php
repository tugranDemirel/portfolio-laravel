<?php

namespace App\Http\Controllers\Admin\WorkAndSchool;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkAndSchoolRequest;
use App\Models\WorkAndSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkAndSchoolController extends Controller
{
    private $work = 1;
    private $school = 0;
    public function schoolIndex()
    {
        $schools = WorkAndSchool::where('type', $this->school)->orderBy('start_date', 'desc')->get();
        return view('admin.workandschool.school', compact('schools'));
    }
    public function workIndex()
    {
        $works = WorkAndSchool::where('type', $this->work)->get();
        return view('admin.workandschool.work', compact('works'));
    }

    public function create()
    {
        return view('admin.workandschool.create-edit');
    }

    public function store(WorkAndSchoolRequest $request)
    {
        $data = $request->except('_token');
        $data = $this->prepareData($data);
        $save = WorkAndSchool::create($data);
        if ($save) {
            return redirect()->back()->with('success', $data['type'].' başarıyla eklendi.');
        }
        return redirect()->back()->with('error', 'Bir hata oluştu.');
    }

    public function edit(WorkAndSchool $workAndSchool, $type)
    {
        $workAndSchool = WorkAndSchool::where('id', $type)->first();
        return view('admin.workandschool.create-edit', compact('workAndSchool'));
    }

    public function update(WorkAndSchoolRequest $request, $type)
    {
        $data = $request->except('_token');
        $data = $this->prepareData($data);
        $update = WorkAndSchool::where('id', $type)->update($data);
        if ($update) {
            return redirect()->back()->with('success', $data['type'].' başarıyla güncellendi.');
        }
        return redirect()->back()->with('error', 'Bir hata oluştu.');
    }

    public function destroy($type)
    {
        $delete = WorkAndSchool::where('id', $type)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Başarıyla silindi.');
        }
        return redirect()->back()->with('error', 'Bir hata oluştu.');
    }

    private function prepareData($data)
    {
        ($data['type'] == $this->school ) ? $data['type'] = $this->school : $data['type'] = $this->work;
        $data['slug'] = Str::slug($data['name']);
        $data['start_date'] = date('Y-m-d', strtotime($data['start_date']));
        $data['end_date'] = date('Y-m-d', strtotime($data['end_date']));
        return $data;
    }
}
