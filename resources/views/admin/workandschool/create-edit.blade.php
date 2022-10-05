@extends('admin.layouts.app')
@section('title', 'Work and School Create')
@section('css')
@endsection
@section('content')
    <div class="page-body clearfix">
        <div class="panel panel-default">
            <div class="panel-heading">Eğitim - İş Geçmişi Ekle</div>
            <div class="panel-body">
                <form id="" method="POST" action="{{ !isset($workAndSchool) ? route('admin.workandschool.store') : route('admin.workandschool.update', ['type' => $workAndSchool->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label>Adı</label>
                        <input type="text" class="form-control" name="name" placeholder="Eğitim ya da İş Adı" value="{{ isset($workAndSchool) ? $workAndSchool->name : '' }}" required />
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="form-control no-resize" name="description" cols="10" rows="5" placeholder="Eğitim ya da İş Açıklaması" required>{{ isset($workAndSchool) ? $workAndSchool->description : '' }}</textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label>Yer</label>
                            <input type="text" class="form-control" name="location" placeholder="Yozgat" value="{{ isset($workAndSchool) ? $workAndSchool->location : '' }}" required />
                        </div>
                        <div class="col-sm-3">
                            <label>Başlangıç Tarihi</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="date" class="form-control" name="start_date" value="{{ isset($workAndSchool) ? date('Y-m-d',strtotime($workAndSchool->start_date)) : '' }}" required placeholder="Ex: 05/11/2016">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>Bitiş Tarihi</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="date" class="form-control" name="end_date" value="{{ isset($workAndSchool) && $workAndSchool->end_date ? date('Y-m-d',strtotime($workAndSchool->end_date)): '' }}" placeholder="Ex: 05/11/2016">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="0" {{ isset($workAndSchool) && $workAndSchool->type == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Eğitim</label>

                            <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="1"  {{ isset($workAndSchool) && $workAndSchool->type == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">İş</label>
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
