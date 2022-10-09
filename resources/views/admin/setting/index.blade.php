@extends('admin.layouts.app')
@section('title', 'Setting')
@section('css')
@endsection
@section('content')
    <div class="page-body clearfix">
        <div class="panel panel-default">
            <div class="panel-heading">Site Ayarları</div>
            <div class="panel-body">
                <form id="" method="POST" action="{{ isset($setting) ? route('admin.setting.update', ['type' => $setting->id]) : route('admin.setting.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Site Adı</label>
                            <input type="text" class="form-control" name="title" placeholder="Site Adı" value="{{ isset($setting) ? $setting->title : '' }}" required />
                        </div>
                        <div class="col-md-6">
                            <label for="">Author</label>
                            <input type="text" name="author" class="form-control" id="" value="{{ isset($setting) ? $setting->author : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Hakkımda</label>
                        <textarea class="form-control no-resize" name="about" placeholder="Hakkımda">{{ isset($setting) ? $setting->about : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Kısa Açıklama</label>
                        <textarea class="form-control no-resize" name="description" id="" >{{ isset($setting) ? $setting->description : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Keywords</label>
                        <input type="text" class="form-control" name="keywords" placeholder="Keywords" value="{{ isset($setting) ? $setting->keywords : '' }}"  />
                    </div>
                    <div class="from-group row">
                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email Adresi" value="{{ isset($setting) ? $setting->email : '' }}"  />
                        </div>
                        <div class="col-md-4">
                            <label>Adres</label>
                            <input type="text" class="form-control" name="address" placeholder="Adres" value="{{ isset($setting) ? $setting->address : '' }}"  />
                        </div>
                        <div class="col-md-4">
                            <label>Telefon</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Telefon" value="{{ isset($setting) ? $setting->phone : '' }}"  />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="">Site Logo</label>
                            <input type="file" name="logo" class="form-control {{ isset($setting) && $setting->logo ? 'is-valid' : 'is-invalid' }}" id="">
                        </div>
                        <div class="col-md-3">
                            <label for="">Site Favicon</label>
                            <input type="file" name="favicon" class="form-control {{ isset($setting) && $setting->favicon ? 'is-valid' : 'is-invalid' }}" id="">
                        </div>
                        <div class="col-md-3">
                            <label for="">Site Image</label>
                            <input type="file" name="image" class="form-control {{ isset($setting) && $setting->image ? 'is-valid' : 'is-invalid' }}" id="">
                        </div>
                        <div class="col-md-3">
                            <label for="">CV</label>
                            <input type="file" name="file" class="form-control {{ isset($setting) && $setting->file ? 'is-valid' : 'is-invalid' }}" id="">
                        </div>
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
@endsection
