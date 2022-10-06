@extends('admin.layouts.app')
@section('title', 'Skill Create')
@section('css')
@endsection
@section('content')
    <div class="page-body clearfix">
        <div class="panel panel-default">
            <div class="panel-heading">Skill Ekle</div>
            <div class="panel-body">
                <form id="" method="POST" action="{{ !isset($skill) ? route('admin.skills.store') : route('admin.skills.update', ['type' => $skill->id]) }}">
                    @csrf
                    <div class="form-group">
                       </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Adı</label>
                            <input type="text" class="form-control" name="name" placeholder="Skill Adı" value="{{ isset($skill) ? $skill->name : '' }}" required />
                        </div>
                        <div class="col-sm-6">
                            <label>Başlangıç Tarihi</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="date" class="form-control" name="start_date" value="{{ isset($skill) ? date('Y-m-d',strtotime($skill->start_date)) : '' }}" required placeholder="Ex: 05/11/2016">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Beceri Seviyesi</label>
                        <input class="form-range" type="range" name="level" value="{{ isset($skill) ? $skill->level : '' }}">
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
    <script>
        $(document).ready(function () {
            $('#range').on('input', function () {
                console.log(this.val);
            });
        });
    </script>
@endsection
