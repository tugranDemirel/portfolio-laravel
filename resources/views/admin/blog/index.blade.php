@extends('admin.layouts.app')
@section('title', 'Blog List')
@section('content')
    <div class="page-body">
        <div class="panel panel-default">
            <div class="panel-heading">Blog Listesi</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table js-exportable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Resim</th>
                            <th>Başlık</th>
                            <th>Durum</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncellenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($blogs->count() > 0)
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img class="img-responsive" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" width="50">
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    @if($blog->status)
                                        <span class="label label-success">Aktif</span>
                                    @else
                                        <span class="label label-danger">Pasif</span>
                                    @endif
                                </td>
                                <td>{{ $blog->created_at }}</td>
                                <td>{{ $blog->updated_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.blog.edit', ['type' => $blog]) }}" style="margin-right: 5px;" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <button type="button" onclick="event.preventDefault(); document.getElementById('delete-skill').submit();" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <form method="POST" id="delete-skill" action="{{ route('admin.project.delete', ['type' => $blog->id]) }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Hiçbir veri bulunamadı.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- #END# Task List -->
    </div>
@endsection
