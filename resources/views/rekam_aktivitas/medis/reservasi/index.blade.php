@extends('template')
@section('main')
<h2>Data Pendaftaran Pasien</h2>
<h5>Menu ini untuk melakukan pendaftaran pasien pada poli-poli yang bersangkutan</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('medis.reservasi.create')}}">
	<i class="entypo-user-add"></i>Tambah Reservasi
</a>
<br/>
<br/>
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
@endif
<div class="row">
	<div class="col-md-12">
		<br/>
		<script type="text/javascript">
				jQuery( document ).ready( function( $ ) {
					var $table4 = jQuery( "#table-1" );
					$table4.DataTable( {
						dom: 'Bfrtip',
						buttons: [
							'copyHtml5',
							'excelHtml5',
							'csvHtml5',
							'pdfHtml5'
						]
					} );
						} );
		</script>
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th width="6%">No Reservasi</th>
					<th>No Rm</th>
					<th>Nama Pasien</th>
					<th>Jenis Kelamin</th>
					<th>Jenis Pasien</th>
					<th>Nama Dokter</th>
					<th>Poli</th>
					<th>No Urut</th>
					<th>Status</th>
					<th width="8%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($reservasi as $reservasi)
				<tr>
					<th>{{$reservasi->kd_res}}</th>
					<th>{{$reservasi->pasien->no_rm}}</th>
					<th>{{$reservasi->pasien->nama_pasien}}</th>
					<th>{{$reservasi->pasien->jenis_kelamin}}</th>
					<th>{{$reservasi->pasien->kategoripasien->nama_kategori}}</th>
					<th>{{$reservasi->dokter->nama}}</th>
					<th>{{$reservasi->poli->nama_poli}}</th>
					<th>{{$reservasi->no_urut}}</th>
					<th>{{$reservasi->status_res}}</th>
					<th>
						<div align="center">
							<form action="{{route('medis.reservasi.delete', ['id'=>$reservasi->id])}}" method="post">
									{{ csrf_field() }}
									<a href="#" class="btn btn-sm btn-info btn-icon icon-left">
										<i class="entypo-print"></i>
										Cetak
									</a>
									{{-- <a href="{{route('pengeluaran.pembelian.show', $reservasi->id)}}" class="btn btn-sm btn-info btn-icon icon-left">
										<i class="entypo-eye"></i>
										Lihat
									</a> --}}
									{{-- <button type="submit" class="btn btn-sm btn-danger btn-icon icon-left" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS PEMBERIAN INI?')">
                    					<i class="entypo-trash"> </i>
                    					Hapus
                  					</button> --}}
							</form>
						</div>
					</th>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection