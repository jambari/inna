@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header bg-primary text-white" >
              Find your scenarios
              </div>
              <div class="card-body" >
              <form method="GET" action="/skenarios" >
                <div class="form-group {{ $errors->has('lintang') ? ' has-error' : '' }}">
                  <label for="exampleInputEmail1">Latidude</label>
                  <input type="text" class="form-control {!! $errors->first('lintang', 'border-warning') !!}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Lintang" name="lintang" >
                  {!! $errors->first('lintang', '<p class="help-block text-warning ">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('bujur') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Longitude</label>
                  <input type="text" class="form-control {!! $errors->first('lintang', 'border-warning') !!}" id="exampleInputPassword1" placeholder="Masukkan Bujur" name="bujur">
                  {!! $errors->first('bujur', '<p class="help-block text-warning">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('mag') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Magnitude</label>
                  <input type="text" class="form-control {!! $errors->first('lintang', 'border-warning') !!}" id="exampleInputPassword1" placeholder="Masukkan Magnitudo" name="mag">
                  {!! $errors->first('mag', '<p class="help-block text-warning ">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('depth') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Depth</label>
                  <input type="text" class="form-control {!! $errors->first('lintang', 'border-warning') !!}" id="exampleInputPassword1" placeholder="Masukkan Kedalaman" name="depth">
                  {!! $errors->first('depth', '<p class="help-block text-warning ">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('origin') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Origin Time</label>
                  <input type="text" class="form-control {!! $errors->first('lintang', 'border-warning') !!}" id="exampleInputPassword1" placeholder="Masukkan Waktu Tiba" name="origin" >
                  {!! $errors->first('origin', '<p class="help-block text-warning">:message</p>') !!}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              </div>
            </div>
        </div>
    </div>  
</div>
@endsection