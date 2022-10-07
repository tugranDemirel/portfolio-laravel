@extends('admin.layouts.app')
@section('title', 'Blog Create')
@section('css')
    <link href="{{ asset('admin/assets/plugins/summernote/dist/summernote.css') }}" rel="stylesheet" />

@endsection
@section('content')
    <div class="page-body clearfix">
        <div class="panel panel-default">
            <div class="panel-heading">Blog Ekle</div>
            <div class="panel-body">
                <form id="" method="POST" action="{{ !isset($blog) ? route('admin.blog.store') : route('admin.blog.update', ['type' => $blog->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Adı</label>
                            <input type="text" class="form-control" name="title" placeholder="Blog Adı" value="{{ isset($blog) ? $blog->title : '' }}" required />
                        </div>
                        <div class="col-md-6">
                            <label for="">Resim</label>
                            <input type="file" name="image" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="form-control no-resize" id="summernote"  name="content" placeholder="Eğitim ya da İş Açıklaması">{{ isset($blog) ? $blog->content : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Kısa Açıklama</label>
                        <textarea class="form-control no-resize" name="description" id="" >{{ isset($blog) ? $blog->description : '' }}</textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Keywords</label>
                            <input type="text" class="form-control" name="keywords" placeholder="Anahtar Kelimeler" value="{{ isset($blog) ? $blog->keywords : '' }}" required />
                        </div>
                        <div class="col-sm-6" style="margin-top: 30px;">
                            <input type="checkbox" name="status" class="form-check-input" id="" {{ isset($blog) && $blog->status ? 'checked' : '' }}>
                            <label for="">Durum</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="m-w-150 btn btn-raised btn-success ">
                            Kaydet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>--}}

<script src="{{ asset('admin/assets/plugins/summernote/dist/summernote.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
