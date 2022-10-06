@extends('admin.layouts.app')
@section('title', 'Project List')
@section('content')
    <div class="page-body">
        <div class="panel panel-default">
            <div class="panel-heading">Proje Listesi</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table js-exportable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Ad</th>
                            <th>Kullanıcı</th>
                            <th>Role</th>
                            <th>Link</th>
                            <th>Teslim Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($projects->count() > 0)
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ date_format($project->completed_at, 'd-m-Y') }}</td>
                                <td>
                                   {{ $project->title }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.project.edit', ['type' => $project]) }}" style="margin-right: 5px;" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <button type="button" onclick="event.preventDefault(); document.getElementById('delete-skill').submit();" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <form method="POST" id="delete-skill" action="{{ route('admin.project.delete', ['type' => $project->id]) }}" method="POST" class="d-none">
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
