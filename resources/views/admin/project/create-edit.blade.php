@extends('admin.layouts.app')
@section('title', 'Projects Create')
@section('css')
@endsection
@section('content')
    <div class="page-body clearfix">
        <div class="panel panel-default">
            <div class="panel-heading">Proje Ekle</div>
            <div class="panel-body">
                <form id="" method="POST" enctype="multipart/form-data" action="{{ isset($project) ? route('admin.project.update', ['type'=>$project]) : route('admin.project.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Proje Adı</label>
                        <input type="text" class="form-control" name="title" placeholder="Proje Adı" value="{{ isset($project) ? $project->title : '' }}" required />
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="form-control no-resize" name="description" cols="10" rows="5" placeholder="Proje Açıklaması" required>{{ isset($project) ? $project->description : '' }}</textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Projeyi Alan Kişi</label>
                            <input type="text" class="form-control" name="client" placeholder="" value="{{ isset($project) ? $project->client : '' }}" />
                        </div>
                        <div class="col-sm-6">
                            <label>Proje Kullanım Alanı</label>
                            <input type="text" class="form-control" name="role" placeholder="Caffe" value="{{ isset($project) ? $project->role : '' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Proje Linki</label>
                            <input type="text" class="form-control" name="link" placeholder="" value="{{ isset($project) ? $project->link : '' }}" required />
                        </div>
                        <div class="col-sm-6">
                            <label>Teslim Tarihi</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="date" class="form-control" name="completed_at" value="{{ isset($project) ? date('Y-m-d',strtotime($project->completed_at)) : '' }}" required placeholder="Ex: 05/11/2016">
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ isset($project) && $project->images() ? 'row' : '' }}">
                        @if( isset($project) && $project->images->count() > 0 )
                        <div class="col-md-4">
                        @endif
                            <label>Proje Görseli</label>
                            <input type="file" multiple class="form-control" name="path[]" placeholder="" value="" />
                        @if( isset($project) && $project->images->count() > 0 )
                        </div>
                        @endif
                        @if( isset($project) && $project->images->count() > 0 )
                            <div class="col-md-8 reload">
                                <div class="row">
                                    @foreach($project->images as $image)
                                        <div class="col-md-4 ">
                                            <div class="thumbnail">
                                                <img src="{{ asset($image->path) }}" style="width: 15%;" alt="{{ $image->name }}" />
                                                <div class="caption">
                                                    <p>
                                                        <a class="btn btn-danger btn-xs delete" data-val="{{ $image->id }}" role="button">Sil</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
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
    <script>
        $(document).ready(function () {
            $('.delete').click(function () {
                var id = $(this).data('val');
                $.ajax({
                    url:'{{ route("admin.project.image.delete") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        type: id
                    },
                    success: function (data) {
                        if(data.status == 'success'){
                            alert('Silindi');
                            $('.reload').load(location.href + ' .reload');
                        }
                    }
                });
            });
        });
    </script>
@endsection
