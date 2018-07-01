@extends('backpack::layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header">
				<i class="fa fa-picture"></i>
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
			</div>
			<div class="box-body">
				<object width="100%" height="850px" data="{{ asset('storage/global/'.$pdf) }}"></object>
			</div>
		</div>
	</div>
</div>

{{--parameter gempabumi --}}

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header">
				<i class="fa fa-picture"></i>
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
			</div>
			<div class="box-body">
				<div class="row">
					{{-- Magnitudo --}}
					<div class="col-md-4">
				        <div class="info-box btn-flat bg-red-gradient"">
				            <span class="info-box-icon"> <i class="wi wi-earthquake"></i> </span>
				            <div class="info-box-content">
				                <span class="info-box-text">Magnitudo</span>
				                <span class="info-box-number">{{ $mag or '-' }}</span>
				            </div>
				        </div>
				    </div>
					{{-- Koordinat --}}
					<div class="col-md-4">
				        <div class="info-box btn-flat bg-green-gradient">
				            <span class="info-box-icon "> <i class="fa fa-map-pin"></i> </span>
				            <div class="info-box-content">
				                <span class="info-box-text">Koordinat</span>
				                <span class="info-box-number">{{ $lintang or '-' }} <sup>0</sup> LS {{ $bujur }} <sup>0</sup> BT</span>
				            </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				        <div class="info-box btn-flat bg-yellow-gradient">
				            <span class="info-box-icon ">  <i class="fa fa-bullseye"></i> </span>
				            <div class="info-box-content">
				                <span class="info-box-text">Kedalaman</span>
				                <span class="info-box-number">{{ $depth }} Km</span>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- tabel arrival --}}

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header">
				<i class="fa fa-picture"></i>
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
			</div>
			<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<th>
								ETA
							</th>
							<th>
								EWH
							</th>
							<th>
								Locations
							</th>
							<tbody>

							@foreach ($arrivals as $arrival)
								<tr 
									@if ($arrival->ehw <= 0.5) 
									style="background-color: yellow" 
									@elseif ($arrival->ehw > 0.5 && $arrival->ehw < 3)
									style="background-color: orange"
									@else 
									style="background-color: red"
									@endif  
								>
									<td>{{ $arrival->eta or '-'}} m</td>
									<td> {{ $arrival->ehw or '-' }} m</td>
									<td> {{ $arrival->location or '-'}} m</td>
								</tr>
							@endforeach
							</tbody>

						</thead>
					</table>
			</div>
		</div>
	</div>
</div>

{{-- animasi penjalaran gelombang --}}
<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header">
				<i class="fa fa-picture"></i>
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
			</div>
			<div class="box-body">
				<img src="{{ asset('storage/gmt/'.$nama) }}" alt="" height="100%" width="100%">
			</div>
		</div>
	</div>
</div>
@endsection