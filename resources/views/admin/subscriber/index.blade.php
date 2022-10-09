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
                            <th>Email</th>
                            <th>Durum</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($subcribers) && $subcribers->count() > 0)
                        @foreach($subcribers as $subcriber)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subcriber->email }}</td>
                                <td>
                                    <span class="label label-{{ $subcriber->status == 1 ? 'success' :'danger' }}">{{ $subcriber->status == 1 ? 'Aktif' :'İnaktif' }}</span>
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
