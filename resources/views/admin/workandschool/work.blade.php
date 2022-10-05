@extends('admin.layouts.app')
@section('title', 'Work List')
@section('content')
    <div class="page-body">
        <div class="panel panel-default">
            <div class="panel-heading">İş Geçmişi Listesi</div>
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
                        @foreach($works as $work)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $work->name }}</td>
                                <td>
                                    <label class="label label-warning">Not Started</label>
                                </td>
                                <td>{{ date_format($work->start_date, 'd-m-Y') }}</td>
                                <td>{{ date_format($work->end_date, 'd-m-Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.workandschool.edit', ['type' => $work]) }}" style="margin-right: 5px;" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <button type="button" onclick="event.preventDefault(); document.getElementById('delete-work').submit();"  class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <form id="delete-work" action="{{ route('admin.workandschool.delete', ['type' => $work->id]) }}" method="POST" class="d-none">
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
