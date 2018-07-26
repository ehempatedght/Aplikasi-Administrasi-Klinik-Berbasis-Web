<?php
namespace App\Http\Controllers\akunting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NamaAkun;
use App\TipeAkun;
use App\Transaksi;
use App\Pemeriksaan;
use App\Donasiuang;
use App\Honor;
use App\Pembelian;
use App\Operasional;
use Auth;
use Excel;
class TransaksiController extends Controller
{
    public function index() {
        $tampilan_penuh = true;
        $transaksi = Transaksi::orderBy('id_transaksi','ASC')->get();
        return view('akunting.transaksi.index', get_defined_vars());
    }
    public function create() {
        $tipeAkun = TipeAkun::all();
        $namaAkun = NamaAkun::all();
        return view('akunting.transaksi.create', get_defined_vars());
    }
    public function save(Request $req) {
        $data = $req->all();
        //dd($data);
        if(!isset($data['transaksi'])) return redirect()->back()->withInput()->with('status','Wajib pilih salah satu jenis transaksi!');
        $this->validateWith(array(
            'tgl' => 'required',
            'id_tipe' => 'required',
            'id_akun' => 'required'
        ));
        if (isset($data['transaksi']['pemasukan'])) {
            Transaksi::create([
                'id_akun' => $data['id_akun'],
                'id_tipe' => $data['id_tipe'],
                'tgl' => date('Y-m-d', strtotime($data['tgl'])),
                'keterangan' => $data['keterangan'],
                'nominal' => str_replace(',', '', $data['nominal']),
                'jumlah' => $data['jumlah'],
                'pengeluaran' => 0,
                'pemasukan' =>  str_replace(',', '', $data['nominal']) * $data['jumlah'],
                'id_pemeriksaan' => $data['id_pemeriksaan'],
                'id_donasi_uang' => $data['id_donasi'],
                'u_id' => Auth::user()->id
            ]);
            if ($data['id_pemeriksaan'] != null) {
                Pemeriksaan::where('id_pemeriksaan', $data['id_pemeriksaan'])->update([
                    'status_akunting' => 1
                ]);
            }

            if ($data['id_donasi'] != null) {
                Donasiuang::where('id', $data['id_donasi'])->update([
                    'status_akunting' => 1
                ]);
            }

            return redirect()->route('transaksi.index')->with('message','TRANSAKSI BERHASIL DITAMBAH!');
        }
        if (isset($data['transaksi']['pengeluaran'])) {
            Transaksi::create([
                'id_akun' => $data['id_akun'],
                'id_tipe' => $data['id_tipe'],
                'tgl' => date('Y-m-d', strtotime($data['tgl'])),
                'keterangan' => $data['keterangan'],
                'nominal' => str_replace(',', '', $data['nominal']),
                'jumlah' => $data['jumlah'],
                'pengeluaran' => str_replace(',', '', $data['nominal']) * $data['jumlah'],
                'pemasukan' =>  0,
                'id_honor' => $data['id_honor'],
                'id_pembelian' => $data['id_pembelian'],
                'id_operasional' => $data['id_operasional'],
                'u_id' => Auth::user()->id
            ]);
            
            if ($data['id_honor'] != null) {
                Honor::where('id', $data['id_honor'])->update([
                    'status_akunting' => 1
                ]);
            }

            if ($data['id_pembelian'] != null) {
                Pembelian::where('id', $data['id_pembelian'])->update([
                    'status_akunting' => 1
                ]);
            }
            if ($data['id_operasional'] != null) {
                Operasional::where('tgl', date('Y-m-d', strtotime($data['tgl_operasional'])))->update([
                    'status_akunting' => 1,
                ]);
            }
            return redirect()->route('transaksi.index')->with('message','TRANSAKSI BERHASIL DITAMBAH!');
        }   
    }
    public function delete($id) {
        $id_transaksi = Transaksi::find($id);
        if ($id_transaksi->id_pemeriksaan != null) {
            Pemeriksaan::find($id_transaksi->id_pemeriksaan)->update([
                'status_akunting' => 0
            ]);
        }
        if ($id_transaksi->id_donasi_uang != null) {
            Donasiuang::find($id_transaksi->id_donasi_uang)->update([
                'status_akunting' => 0
            ]);
        }

        if ($id_transaksi->id_honor != null) {
            Honor::find($id_transaksi->id_honor)->update([
                'status_akunting' => 0
            ]);
        }

        if ($id_transaksi->id_pembelian != null) {
            Pembelian::find($id_transaksi->id_pembelian)->update([
                'status_akunting' => 0
            ]);
        }

        if ($id_transaksi->id_operasional != null) {
            Operasional::where('tgl', $id_transaksi->operasional->tgl)->update([
                'status_akunting' => 0
            ]);
        }
        $id_transaksi->delete();
        return redirect()->route('transaksi.index')->with('message','TRANSAKSI '.strtoupper($id_transaksi->keterangan).' BERHASIL DIHAPUS!');
    }
    //Laporan Berdasarkan Akun
    public function berdasarkan_akun() {
        $tipeAkun = TipeAkun::orderBy('nama_tipe','ASC')->get();
        return view('akunting.laporan.berdasarkan_tipe_akun.index', get_defined_vars());
    }
    public function output_berdasarkan_akun($tanggal_awal, $tanggal_akhir, $akun, $tipe
    ) {
        $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
        $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
        if ((date('d', strtotime($tanggal_awal)) == '01' AND date('d', strtotime($tanggal_akhir)) >= '30') AND date('m', strtotime($tanggal_awal)) == date('m', strtotime($tanggal_akhir))) {
            $bulanan = true;
        } else $bulanan = false;
        $akun = Transaksi::where('id_tipe', $akun)->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->groupBy('id_akun')->get();
        
        if (empty($akun->first()->id_tipe)) {
            return redirect()->back()->with('message','AKUN BELUM MEMPUNYAI LAPORAN ATAU TIDAK ADA LAPORAN PADA TANGGAL YANG DIINPUT!');
        } else {
            if ($tipe == 'pdf') {
                $tampilan_penuh = true;
                return view('akunting.laporan.berdasarkan_tipe_akun.pdf', get_defined_vars());
            } else {
                return Excel::create("Laporan Keuangan Tipe Akun ".$akun->first()->tipe_akun->nama_tipe." - ".date('d-m-Y', strtotime($tanggal_awal)). " s/d " .date('d-m-Y', strtotime($tanggal_akhir)), function($excel) use ($tanggal_awal, $tanggal_akhir, $bulanan, $akun){
                    $excel->sheet('Sheet1', function($sheet) use ($tanggal_awal, $tanggal_akhir, $bulanan, $akun) {
                        $sheet->loadView('akunting.laporan.berdasarkan_tipe_akun.excel', get_defined_vars());
                    });
                })->export('xls');
            }
        }
    }
    //LAPORAN DETAIL AKUN
    public function detail_akun() {
        $tipeAkun = TipeAkun::orderBy('nama_tipe','ASC')->get();
        $namaAkun = NamaAkun::orderBy('nama_akun', 'ASC')->get();
        return view('akunting.laporan.detail_akun.index', get_defined_vars());
    }
    public function output_detail_akun($tanggal_awal, $tanggal_akhir, $tipe_akun, $nama_akun, $tipe) {
        $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
        $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
        if ((date('d', strtotime($tanggal_awal)) == '01' AND date('d', strtotime($tanggal_akhir)) >= '30') AND date('m', strtotime($tanggal_awal)) == date('m', strtotime($tanggal_akhir))) {
            $bulanan = true;
        } else {
            $bulanan = false;
        }
        if ($tipe_akun == 'all' && $nama_akun == 'all') {
            $akun = NamaAkun::get();
            $transaksi = Transaksi::whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->get();
        } elseif ($tipe_akun != null && $nama_akun == 'all') {
            $akun = NamaAkun::where('id_tipe', $tipe_akun)->get();
            $transaksi = Transaksi::where('id_tipe', $tipe_akun)->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->get();
        } elseif ($tipe_akun == 'all' && $nama_akun != null) {
            $akun = NamaAkun::where('id_akun', $nama_akun)->get();
            $transaksi = Transaksi::where('id_akun', $nama_akun)->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->get();
        } else {
            $akun = NamaAkun::where('id_akun', $nama_akun)->where('id_tipe', $tipe_akun)->get();
            $transaksi = Transaksi::where('id_tipe', $tipe_akun)->where('id_akun', $nama_akun)->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->get();
        }
        if (empty($transaksi->first()->id_tipe)) {
            return redirect()->back()->with('message','AKUN BELUM MEMPUNYAI LAPORAN ATAU TIDAK ADA LAPORAN PADA TANGGAL YANG DIINPUT!');
        }
        if ($tipe == 'pdf') {
            $tampilan_penuh = true;
            return view('akunting.laporan.detail_akun.pdf', get_defined_vars());
        } else {
            return Excel::create('Laporan Detail Keuangan Per Akun - '.date('d-m-Y', strtotime($tanggal_awal)). " s/d " .date('d-m-Y', strtotime($tanggal_akhir)), function($excel) use ($tanggal_awal, $tanggal_akhir, $tipe_akun, $nama_akun, $akun, $bulanan){
                    $excel->sheet('Sheet1', function($sheet) use ($tanggal_awal, $tanggal_akhir, $tipe_akun, $nama_akun, $akun, $bulanan) {
                        $sheet->loadView('akunting.laporan.detail_akun.excel', get_defined_vars());
                    });
                })->export('xls');
        }
    }
    //LAPORAN LABA/RUGI
    public function laba_rugi() {
        return view('akunting.laporan.laba_rugi.index');
    }
    public function output_laba_rugi($tanggal_awal, $tanggal_akhir, $tipe) {
        $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
        $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
        if ((date('d', strtotime($tanggal_awal)) == '01' AND date('d', strtotime($tanggal_akhir)) >= '30') AND date('m', strtotime($tanggal_awal)) == date('m', strtotime($tanggal_akhir))) {
            $bulanan = true;
        } else {
            $bulanan = false;
        }
        $pemasukan = NamaAkun::where('id_tipe', '3')->first();
        $pengeluaran = NamaAkun::where('id_tipe', '4')->first();
        $pemasukan_ = Transaksi::where('id_tipe', '3')->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->groupBy('id_akun')->get();
        // dd($pemasukan_);
        $pengeluaran_ = Transaksi::where('id_tipe', '4')->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->groupBy('id_akun')->get();
        // dd($pengeluaran_);
        if (empty($pemasukan_->first()->id_tipe) && empty($pengeluaran_->first()->id_tipe)) {
            return redirect()->back()->with('message','TIDAK ADA LAPORAN PADA PERIODE YANG DI INPUT');
        }
        if ($tipe == 'pdf') {
            $tampilan_penuh = true;
            return view('akunting.laporan.laba_rugi.pdf', get_defined_vars());
        }
    }
    //laporan neraca
    public function neraca() {
        return view('akunting.laporan.neraca.index');
    }
    public function output_neraca($tanggal_awal, $tanggal_akhir, $tipe) {
        $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
        $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
        if ((date('d', strtotime($tanggal_awal)) == '01' AND date('d', strtotime($tanggal_akhir)) >= '30') AND date('m', strtotime($tanggal_awal)) == date('m', strtotime($tanggal_akhir))) {
            $bulanan = true;
        } else {
            $bulanan = false;
        }
        $aktiva = NamaAkun::where('id_tipe', '1')->first();
        $pasiva = NamaAkun::where('id_tipe', '2')->first();
        $aktiva_ = Transaksi::where('id_tipe', '1')->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->groupBy('id_akun')->get();
        // dd($pemasukan_);
        $pasiva_ = Transaksi::where('id_tipe', '2')->whereBetween('tgl', [$tanggal_awal, $tanggal_akhir])->groupBy('id_akun')->get();
        // dd($pengeluaran_);
        if (empty($aktiva_->first()->id_tipe) && empty($pasiva_->first()->id_tipe)) {
            return redirect()->back()->with('message','TIDAK ADA LAPORAN PADA PERIODE YANG DI INPUT');
        }
        if ($tipe == 'pdf') {
            $tampilan_penuh = true;
            return view('akunting.laporan.neraca.pdf', get_defined_vars());
        }
    }
}