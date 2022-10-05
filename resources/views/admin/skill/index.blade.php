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
                            <th>Type</th>
                            <th>Başlama Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schools as $school)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $school->name }}</td>
                                <td>
                                    <label class="label label-warning">Not Started</label>
                                </td>
                                <td>{{ date_format($school->start_date, 'd-m-Y') }}</td>
                                <td>{{ date_format($school->end_date, 'd-m-Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.workandschool.edit', ['type' => $school]) }}" style="margin-right: 5px;" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <button type="button" onclick="event.preventDefault(); document.getElementById('delete-school').submit();" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <form id="delete-school" action="{{ route('admin.workandschool.delete', ['type' => $school->id]) }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- #END# Task List -->
    </div>
@endsection
