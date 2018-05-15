@extends('template')
@section('main')
<h2>Data Pendaftaran Pasien</h2>
<h5>Menu ini untuk melakukan pendaftaran pasien pada poli-poli yang bersangkutan</h5><br/>
<a class="btn btn-blue btn-sm btn-icon icon-left" href="{{route('medis.reservasi.create')}}">
	<i class="entypo-user-add"></i>Tambah Pendaftaran
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
					{{-- <th>Status</th> --}}
					<th width="8%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($reservasi as $reservas)
				<tr>
					<th>{{$reservas->kd_res}}</th>
					<th>{{$reservas->pasien->no_rm}}</th>
					<th>{{$reservas->pasien->nama_pasien}}</th>
					<th>{{$reservas->pasien->jenis_kelamin}}</th>
					<th>{{$reservas->pasien->kategoripasien->nama_kategori}}</th>
					<th>{{$reservas->dokter->nama}}</th>
					<th>{{$reservas->poli->nama_poli}}</th>
					<th>{{$reservas->no_urut}}</th>
					{{-- <th>
						@if($pemeriksaan->reservasi->)
						Sudah
						@else
						Belum
						@endif
					</th> --}}
					<th>
						<div align="center">
							<form action="#" method="post">
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