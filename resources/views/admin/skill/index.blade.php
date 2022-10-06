@extends('admin.layouts.app')
@section('title', 'Skill List')
@section('content')
    <div class="page-body">
        <div class="panel panel-default">
            <div class="panel-heading">Skill Listesi</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table js-exportable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Ad</th>
                            <th>Başlama Tarihi</th>
                            <th>Progress Bar</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($skills->count() > 0)
                        @foreach($skills as $skill)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $skill->name }}</td>
                                <td>{{ date_format($skill->start_date, 'd-m-Y') }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: {{ $skill->level }}%">
                                            {{$skill->level}}%</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.skills.edit', ['type' => $skill]) }}" style="margin-right: 5px;" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <button type="button" onclick="event.preventDefault(); document.getElementById('delete-skill').submit();" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <form id="delete-skill" action="{{ route('admin.skills.delete', ['type' => $skill->id]) }}" method="POST" class="d-none">
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
