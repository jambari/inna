@extends('layouts.app')
@section('content')

<style>
#box {
    border: 1px solid red !important;
}
</style>
<div class="content">
    <div class="row justify-content-center" >
        <div class="col-md-8 box" >
        {{--  notifikasi  --}}
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
            @endif
                @if ($message = Session::get('pesan'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
            @endif
        {{--  end of notifikasi  --}}
        </div>
    </div>
    <div class="row justify-content-center"> 
        <div class="col-md-8" >
            <div class="row">
                <div class="col-md-6" id="box">
                    <img src="{{ asset("storage/".$nama."'") }}" alt="">
                </div>
                <div class="col-md-6">
                    <p>Magnitudo</p>
                    <p>Lokasi</p>
                    <p>Kedalaman</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection