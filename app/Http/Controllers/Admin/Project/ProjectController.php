<?php

namespace App\Http\Controllers\Admin\Project;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Image;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all()->sortByDesc('id');
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create-edit');
    }

    public function store(ProjectRequest $request)
    {
        $data = $request->except('_token');
        if ($data['path'] && is_array($data['path']))
             $path = ImageHelper::uploadMultipleImage($data['path'], 'project');
        else
            $path = ImageHelper::uploadImage($data['path'], 'project');
        unset($data['path']);
        $data['slug'] = Str::slug($data['title']);
        $save = Project::create($data);
        foreach ($path as $item)
        {
            Image::create([
                'path' => $item,
                'project_id' => $save->id
            ]);
        }
        if ($save)
            return redirect()->route('admin.project.index')->with('success', 'Projen başarılı bir şekilde oluşturuldu.');
        else
            return redirect()->back()->with('error', 'Proje oluşturulurken bir hata oluştu.');

    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin.project.create-edit', compact('project'));
    }

    public function update(ProjectRequest $request, $type)
    {
        $data = $request->except('_token');
        $project = Project::find($type);
        if($request->hasFile('path'))
        {
            if ($data['path'] && is_array($data['path'])){
                Image::where('project_id', $project->id)->delete();
                $path = ImageHelper::uploadMultipleImage($data['path'], 'project');
            }
            else{
                $path = ImageHelper::updateImage($data['path'], 'project', $project->path);
            }
            unset($data['path']);
        }
        $data['slug'] = Str::slug($data['title']);
        $update = $project->update($data);
        if (isset($path)){

            foreach ($path as $item)
            {
                Image::create([
                    'path' => $item,
                    'project_id' => $project->id
                ]);
            }
        }


        if ($update)
            return redirect()->route('admin.project.index')->with('success', 'Projen başarılı bir şekilde güncellendi.');
        else
            return redirect()->back()->with('error', 'Proje güncellenirken bir hata oluştu.');


    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $images = Image::where('project_id', $project->id)->get();
        ImageHelper::deleteMultipleImage($images);
        Image::where('project_id', $project->id)->delete();
        $delete = $project->delete();
        if ($delete)
            return redirect()->route('admin.project.index')->with('success', 'Projen başarılı bir şekilde silindi.');
        else
            return redirect()->back()->with('error', 'Proje silinirken bir hata oluştu.');
    }

    public function imageDestroy(Request $request)
    {

        $image = Image::where('id', $request->type)->first();
        $delete = ImageHelper::deleteImage($image->path);
        if ($delete)
        {
            $image->delete();
            return response()->json(['status' => 'success']);
        }
        else
            return response()->json(['status' => 'error']);
    }

}
