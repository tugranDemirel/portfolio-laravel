@extends('admin.layouts.app')
@section('title', 'Contact List')
@section('content')
    <div class="page-body">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default email-panel">
                    <div class="email-panel-heading">
                        <div class="row clearfix">
                            <div class="col-sm-7">
                                <h2>{{ $contact->subject }}</h2>
                            </div>
                            <div class="col-sm-5 align-right">
                                <div class="btn-group">
                                    <button id="back" class="btn btn-sm btn-default m-l-15"><i class="fa fa-reply font-14 m-r-5"></i></button>
                                    <button onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-sm btn-default" title="Delete email"><i class="fa fa-trash"></i></button>
                                    <form id="delete-form" action="{{ route('admin.contact.delete', $contact->id) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-7">
                                <div class="from-email">Gönderen: <b>{{ $contact->email }}</b></div>
                            </div>
                            <div class="col-sm-5 align-right">
                                <div class="date-info">December 11, 2016 00:07</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="email-body">
                            <p>{{ $contact->message }}</p>
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
            $('#back').click(function () {
                location.reload();
                window.history.back();
            });
        });
    </script>
@endsection
