@extends('backpack::layout')

@section('header')
    <section class="content-header">
{{--       <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1> --}}
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Simulasi</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Cari Simulasi</div>
                </div>

                <div class="box-body">
                  @if (session('alert'))
                    <div class="alert alert-warning">
                        {{ session('alert') }}
                    </div>
                  @endif
              <form method="GET" action="skenario" >
                <div class="form-group {{ $errors->has('lintang') ? ' has-error' : '' }}">
                  <label for="exampleInputEmail1">Lintang</label>
                  <input type="text" class="form-control {!! $errors->first('lintang', 'border-warning') !!}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Lintang" name="lintang" >
                  {!! $errors->first('lintang', '<p class="help-block text-warning ">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('bujur') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Bujur</label>
                  <input type="text" class="form-control {!! $errors->first('lintang', 'border-warning') !!}" id="exampleInputPassword1" placeholder="Masukkan Bujur" name="bujur">
                  {!! $errors->first('bujur', '<p class="help-block text-warning">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('mag') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Magnitudo</label>
                  <input type="text" class="form-control {!! $errors->first('lintang', 'border-warning') !!}" id="exampleInputPassword1" placeholder="Masukkan Magnitudo" name="mag">
                  {!! $errors->first('mag', '<p class="help-block text-warning ">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('depth') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Kedalaman</label>
                  <input type="text" class="form-control {!! $errors->first('lintang', 'border-warning') !!}" id="exampleInputPassword1" placeholder="Masukkan Kedalaman" name="depth">
                  {!! $errors->first('depth', '<p class="help-block text-warning ">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('origin') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Origin</label>
                  <input type="text" class="form-control {!! $errors->first('lintang', 'border-warning') !!}" id="exampleInputPassword1" placeholder="Masukkan Waktu Tiba" name="origin" >
                  {!! $errors->first('origin', '<p class="help-block text-warning">:message</p>') !!}
                </div>
                <button type="submit" class="btn btn-block btn-primary">Submit</button>
              </form>
                </div>
            </div>
        </div>
    </div>
@endsection
