@extends('template')
@section('main')
<style>
.col-sm-1 {
    width: 45px;
}
</style>
<div class="row">
    <h2 align="center">Laporan Laba(Rugi)</h2>
    <br />
    <br />
</div>
<div>
    <form role="form" class="form-horizontal" action="" method="GET">
        @if(session('message'))
        <div class="col-sm-12" align="center">
            <div class="alert alert-info">{{session('message')}}<button class="close" data-dismiss="alert" type="button">×</button></div>
        </div>
        @endif
        <div class="form-group">
            <label class="col-sm-4 control-label">Periode: </label>
            <div class="col-sm-4">
                <div class="input-group">
                    <input type="text" id="periode" name="periode" required  class="form-control">
                    <div class="input-group-addon">
                        <a href="#"><i class="entypo-calendar"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <br />
            <div class="col-sm-12">
                <center>
                    <button type="button" id="print" class="btn btn-green btn-icon icon-left">
                        Cetak Laporan
                        <i class="entypo-print"></i>
                    </button>
                </center>
            </div>
            <br />
        </div>
    </form>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#periode').datepicker({
        minViewMode: 'months',
        autoclose: true,
        format: 'MM yyyy'
    });

    $('#print').click(function() {
        var periode = $('#periode').val().split(" ");
        if (periode.length > 1) {
            window.location.href = home_url + '/laporan/akunting/laba_rugi/' + periode[0] + '/' + periode[1] + '/pdf';
        }
    });
});
</script>
@endsection
