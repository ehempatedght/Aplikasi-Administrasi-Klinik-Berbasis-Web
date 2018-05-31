@extends('template')
@section('main')
<style>
.col-sm-1 {
    width: 45px;
}

.select2-container .select2-choice {
    display: block!important;
    height: 30px!important;
    white-space: nowrap!important;
    line-height: 26px!important;
}
</style>
<div class="row">
    <h2 align="center">Laporan Keuangan Detail Per Akun</h2>
    <br />
    <br />
@if(session('message'))
<div class="col-sm-12" align="center">
    <div class="alert alert-info">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
</div>
        @endif
</div>
<div class="row">
    <form role="form" class="form-horizontal">
        <div class="form-group">
            <label class="col-md-3 control-label">Periode Laporan :</label>
            <div class="col-md-2">
                <div class="input-group">
                    <input type="text" class="form-control datepicker" id="tanggal_awal" name="tanggal_awal" data-format="dd-mm-yyyy" value="01-01-<?= date('Y'); ?>" />
                    <div class="input-group-addon">
                        <a href="#"><i class="entypo-calendar"></i></a>
                    </div>
                </div>
            </div>
            <label class="col-sm-2 control-label"><center>s/d</center></label>
            <div class="col-md-2">
                <div class="input-group">
                    <input type="text" class="form-control datepicker" id="tanggal_akhir" name="tanggal_akhir" data-format="dd-mm-yyyy" value="<?= date('d-m-Y'); ?>" />
                    <div class="input-group-addon">
                        <a href="#"><i class="entypo-calendar"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Tipe Akun :</label>
            <div class="col-sm-6">
                <select class="form-control select2 tipe_akun" name="tipe_akun" id="tipe_akun" required>
                        <option value="all">Semua</option>
                    @foreach ($tipeAkun as $row)
                        <option value="{{ $row->id_tipe }}">{{ $row->nama_tipe }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">Nama Akun :</label>
            <div class="col-sm-6">
                <select class="form-control select2 nama_akun" name="nama_akun" id="nama_akun" required>
                        <option value="all">Semua</option>
                    @foreach ($namaAkun as $row)
                        <option value="{{ $row->id_akun }}">{{ $row->nama_akun }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="form-group">
            <div class="col-sm-12" align="center">
                <button type="button" id="print" class="btn btn-green btn-icon icon-left">
                    Cetak Laporan
                    <i class="entypo-print"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#print').click(function() {
            var tanggal_awal = $('#tanggal_awal').val();
            var tanggal_akhir = $('#tanggal_akhir').val();
            var tipe_akun = $('#tipe_akun').val();
            var nama_akun = $('#nama_akun').val();

            window.location.href = home_url + '/laporan/akunting/detail_akun/' + tanggal_awal + '/' + tanggal_akhir + '/' + tipe_akun + '/' + nama_akun +'/pdf';
        });

            $(document).on('change', '.tipe_akun', function() {
            if ($(this).val() == "1") {
                $("#nama_akun").empty();
                $("#nama_akun").append($("<option></option>").attr("value","all").text("Semua"));
                $("#nama_akun").select2();
                @foreach($namaAkun as $row)
                @if($row->id_tipe == '1')
                $("#nama_akun").append($('<option></option>').attr("value","{{$row->id_akun}}").text("{{$row->nama_akun}}"));
                @endif
                @endforeach
            } else if($(this).val() == "2") {
                $("#nama_akun").empty();
                $("#nama_akun").append($("<option></option>").attr("value","all").text("Semua"));
                $("#nama_akun").select2();
                @foreach($namaAkun as $row)
                @if($row->id_tipe == '2')
                $("#nama_akun").append($('<option></option>').attr("value","{{$row->id_akun}}").text("{{$row->nama_akun}}"));
                @endif
                @endforeach
            } else if($(this).val() == "3") {
                $("#nama_akun").empty();
                $("#nama_akun").append($("<option></option>").attr("value","all").text("Semua"));
                $("#nama_akun").select2();
                @foreach($namaAkun as $row)
                @if($row->id_tipe == '3')
                $("#nama_akun").append($('<option></option>').attr("value","{{$row->id_akun}}").text("{{$row->nama_akun}}"));
                @endif
                @endforeach
            } else if ($(this).val() == "4") {
                $("#nama_akun").empty();
                $("#nama_akun").append($("<option></option>").attr("value","all").text("Semua"));
                $("#nama_akun").select2();
                @foreach($namaAkun as $row)
                @if($row->id_tipe == '4')
                $("#nama_akun").append($('<option></option>').attr("value","{{$row->id_akun}}").text("{{$row->nama_akun}}"));
                @endif
                @endforeach
            } else {
                $("#nama_akun").empty();
                $("#nama_akun").append($("<option></option>").attr("value","all").text("Semua"));
                $("#nama_akun").select2();
                @foreach($namaAkun as $row)
                $("#nama_akun").append($('<option></option>').attr("value","{{$row->id_akun}}").text("{{$row->nama_akun}}"));
                @endforeach
            }
        });
    });
</script>
@endsection