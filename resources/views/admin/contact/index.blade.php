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
{{--                        <span class="badge bg-warning">{{ $contacts->where('created_at', '==', null)->count() }}</span>--}}
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10">
                <div class="panel panel-default email-panel">
                    <div class="email-panel-heading">
                        <div class="row clearfix">
                            <div class="col-sm-5">
                                <h2>GELEN KUTUSU ({{ $contacts->count() }})</h2>
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
                                <input type="checkbox" class="js-selectall" id="selectAll" />
                                <button class="reflesh btn btn-sm btn-default m-l-15"><i class="fa fa-refresh font-14 m-r-5"></i>Refresh</button>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-default" title="Set as read"><i class="fa fa-eye"></i></button>
                                    <button id="allDelete" class="btn btn-sm btn-default" title="Delete email"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body email-panel-body" id="reload">
                        <div class="table-responsive">
                            <table class="table table-hover"  >
                                <tbody>
                                @if($contacts->count())
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><a href="javascript:void(0);"  data-id="{{ $contact->id }}" class="js-btn-email-star"><i class="fa fa-star {{ $contact->important ? 'important' : '' }}"></i></a></td>
                                        <td><a href="{{ route('admin.contact.show', ['id' => $contact->id]) }}"><b>{{ $contact->name }}</b></a></td>
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
@section('js')
    <script>
        $(document).ready(function () {
            $('.js-btn-email-star').on('click', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route('admin.contact.changeStar') }}',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                           if (response.success === true) {
                              window.location.reload();
                           }
                    }
                });
            });
            $('#allDelete').click(function () {
                if ($('#selectAll').is(':checked')){
                    $.ajax({
                        url: '{{ route('admin.contact.allDelete') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success === true) {
                                window.location.reload();
                            }
                        }
                    });
                }
                else
                    alert('Lütfen seçim yapınız');
            });
        });
        $('.reflesh').click(function () {
            $('#reload').load(document.URL +  ' #reload');
        });
    </script>
@endsection
