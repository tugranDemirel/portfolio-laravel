<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DOMDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('admin.blog.index' , compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create-edit');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['title']);
        if ($request->hasFile('image')) {
            $data['image'] = ImageHelper::uploadImage($data['image'], 'blog');
        }
        $data['author'] = Auth::user()->name;
        $data['status'] = isset($data['status']) ? 1 : 0;

        $dom = new DOMDocument();
        libxml_use_internal_errors(true); //disable libxml errors
        libxml_clear_errors(); // clear errors for html5
        $dom->loadHTML($data['content'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $img){
            $src = $img->getAttribute('src');
            if(preg_match('/data:image/', $src)){
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $filename = uniqid();
                $fileNameContentRand = substr(md5($filename), 6, 6).'-'.time();
                $filepath = "/media/blog/{$fileNameContentRand}.{$mimetype}";
                $image = ImageManagerStatic::make($src)
                    ->encode($mimetype, 100)
                    ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }
        $data['content'] = $dom->saveHTML();
        $blog = Blog::create($data);
        if($blog)
            return redirect()->route('admin.blog.index')->with('success', 'Blog Başarılı Bir Şekilde Oluşturuldu.');
        else
            return redirect()->back()->with('error', 'Blog Oluşturulamadı.');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.create-edit', compact('blog'));
    }

    public function update(Request $request, $type)
    {
        $blog = Blog::find($type);
        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['title']);
        if ($data['image']) {
            ImageHelper::deleteImage($blog->image);
            $data['image'] = ImageHelper::uploadImage($data['image'], 'blog');
        }
        else
            $data['image'] = $blog->image;
        $data['author'] = Auth::user()->name;
        $data['status'] = isset($data['status']) ? 1 : 0;
        $dom = new DOMDocument();
        libxml_use_internal_errors(true); //disable libxml errors
        libxml_clear_errors(); // clear errors for html5
        $dom->loadHTML($data['content'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $img){
            $src = $img->getAttribute('src');
            if(preg_match('/data:image/', $src)){
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $filename = uniqid();
                $fileNameContentRand = substr(md5($filename), 6, 6).'-'.time();
                $filepath = "/media/blog/{$fileNameContentRand}.{$mimetype}";
                $image = ImageManagerStatic::make($src)
                    ->encode($mimetype, 100)
                    ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }
        $data['content'] = $dom->saveHTML();
        $updated = $blog->update($data);
        if ($updated)
            return redirect()->route('admin.blog.index')->with('success', 'Blog Başarılı Bir Şekilde Güncellendi.');
        else
            return redirect()->back()->with('error', 'Blog Güncellenemedi.');
    }

}
