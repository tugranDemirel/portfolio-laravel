@extends('admin.layouts.app')
@section('title', 'Contact List')
@section('content')
    <div class="page-body">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-2 email-menu">
                <div class="list-group">
                    <a href="{{ route('admin.contact.index') }}" class="list-group-item">
                        <i class="fa fa-inbox fa-fw m-r-5"></i>Gelen Kutusu
                        <span class="badge bg-warning">{{ $contacts->count() }}</span>
                    </a>
                    <a href="{{ route('admin.contact.important') }}" class="list-group-item">
                        <i class="fa fa-exclamation-circle fa-fw m-r-5"></i>Önemli
                        <span class="badge bg-warning">{{ $contacts->where('important', true)->count() }}</span>
                    </a>
                    <a href="{{ route('admin.contact.read') }}" class="list-group-item">
                        <i class="fa fa-file-text-o fa-fw m-r-5"></i>Okunmamış
                        <span class="badge bg-warning">{{ $contacts->where('read_receipt', false)->count() }}</span>
                    </a>
                    <a href="javascript:void(0);" class="list-group-item">
                        <i class="fa fa-trash-o fa-fw m-r-5"></i>Çöp Kutusu
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10">
                <div class="panel panel-default email-panel">
                    <div class="email-panel-heading">
                        <div class="row clearfix">
                            <div class="col-sm-5">
                                <h2>ÖNEMLİ İŞARETLENMİŞ ({{ $contacts->where('important', true)->count() }})</h2>
                            </div>
                            <div class="col-sm-7 align-right">
                                <form class="pull-right email-search">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control" placeholder="Search in email..." name="Query" id="Query" required>
                                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row clearfix m-t-15">
                            <div class="col-sm-6">
                                <input type="checkbox" class="js-selectall" />
                                <button class="btn btn-sm btn-default m-l-15"><i class="fa fa-refresh font-14 m-r-5"></i>Refresh</button>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-default" title="Set as read"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-sm btn-default" title="Delete email"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body email-panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                @if($contacts->count())
                                @foreach($contacts->where('important', true) as $contact)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><a href="javascript:void(0);" class="js-btn-email-star"><i class="fa fa-star {{ $contact->important ? 'important' : '' }}"></i></a></td>
                                        <td><a href="{{ route('admin.contact.show', ['id' => $contact->id]) }}">{{ $contact->name }}</a></td>
                                        <td><a href="{{ route('admin.contact.show', ['id' => $contact->id]) }}">{{ $contact->subject }}</a></td>
                                        <td>{{ date_format($contact->created_at, 'H:i') }}</td>
                                        <td>{{ date_format($contact->created_at, 'd/m/Y') }}</td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Kayıt Bulunamadı</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
