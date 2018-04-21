@extends('template')

@section('main')
<h2>Atur Jadwal {{$petugas->nama}}</h2>
<br/>
@if(count($errors) > 0) 
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>
			{{$error}}
		</li>
		@endforeach
	</ul>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<hr />
		<ol class="breadcrumb bc-3" >
			<li>
				<a href="{{route('masterdata.petugasmedis.jadwal.petugas')}}"><i class="fa fa-home"></i>Petugas</a>
			</li>
			<li class="active">
				<strong>Atur Jadwal</strong>
			</li>
		</ol>
		<div class="panel panel-primary" data-collapsed="0">
			
			<div class="panel-heading">
				<div class="panel-title">
					Form Inputs
				</div>
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>

			<div class="panel-body">
				<form role="form" class="form-horizontal form-groups-bordered" action="{{route('masterdata.petugasmedis.jadwal.add', $petugas->id)}}" method="post">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="field-1" class="col-sm-2 control-label" style="text-align:left;">&emsp;Hari Praktek</label>
						<div class="row">
							<div class="col-md-2">
								<b-checkbox-group>
									@foreach($days as $day)
										<div class="checkbox checkbox-replace color-green" style="margin-bottom: -5px;">
											<b-checkbox v-model="daysSelected" :native-value="{{$day->id}}" name="days[]"> {{$day->days}}</b-checkbox>
										</div>
										<br/>
									@endforeach
								</b-checkbox-group>
							</div>
							 <div class="col-md-2" style="margin-top: 10px;">
								<div class="form-control-wrapper">
									<input type="text" id="time" class="form-control floating-label" placeholder="jam mulai" name="senin1" value="{{$petugas->senin1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time2" class="form-control floating-label" placeholder="jam mulai" name="selasa1" value="{{$petugas->selasa1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time3" class="form-control floating-label" placeholder="jam mulai" name="rabu1" value="{{$petugas->rabu1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time4" class="form-control floating-label" placeholder="jam mulai" name="kamis1" value="{{$petugas->kamis1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time5" class="form-control floating-label" placeholder="jam mulai" name="jumat1" value="{{$petugas->jumat1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time6" class="form-control floating-label" placeholder="jam mulai" name="sabtu1" value="{{$petugas->sabtu1}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time7" class="form-control floating-label" placeholder="jam mulai" name="minggu1" value="{{$petugas->minggu1}}">
								</div>
								<br/>
							</div>
							<div class="col-md-2" style="margin-top: 10px;">
								<div class="form-control-wrapper">
									<input type="text" id="time8" class="form-control floating-label" placeholder="jam selesai" name="senin2" value="{{$petugas->senin2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time9" class="form-control floating-label" placeholder="jam selesai" name="selasa2" value="{{$petugas->selasa2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time10" class="form-control floating-label" placeholder="jam selesai" name="rabu2" value="{{$petugas->rabu2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time11" class="form-control floating-label" placeholder="jam selesai" name="kamis2" value="{{$petugas->kamis2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time12" class="form-control floating-label" placeholder="jam selesai" name="jumat2" value="{{$petugas->jumat2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time13" class="form-control floating-label" placeholder="jam selesai" name="sabtu2" value="{{$petugas->sabtu2}}">
								</div>
								<br/>
								<div class="form-control-wrapper">
									<input type="text" id="time14" class="form-control floating-label" placeholder="jam selesai" name="minggu2" value="{{$petugas->minggu2}}">
								</div>
								<br/>
							</div>
						</div>
					</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
				</form>
				<a href="{{route('masterdata.petugasmedis.jadwal.petugas')}}" class="btn btn-red btn-icon icon-left col-left">
					Batal
					<i class="entypo-cancel"></i>
				</a>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#time').timepicker();
		$('#time2').timepicker();
		$('#time3').timepicker();
		$('#time4').timepicker();
		$('#time5').timepicker();
		$('#time6').timepicker();
		$('#time7').timepicker();
		$('#time8').timepicker();
		$('#time9').timepicker();
		$('#time10').timepicker();
		$('#time11').timepicker();
		$('#time12').timepicker();
		$('#time13').timepicker();
		$('#time14').timepicker();
		$('input').on('keydown', function(event) {
	        if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
	           var $t = $(this);
	           event.preventDefault();
	           var char = String.fromCharCode(event.keyCode);
	           $t.val(char + $t.val().slice(this.selectionEnd));
	           this.setSelectionRange(1,1);
	        }
    });
});
</script>
@endsection
@section('scripts')
  <script>
  var app = new Vue({
    el: '#app',
    data: {
      daysSelected: {!!$petugas->days->pluck('id')!!}
    }
  });
  </script>
@endsection