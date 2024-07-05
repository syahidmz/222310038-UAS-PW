<?php

namespace App\Http\Controllers;

use App\Models\banks;
use Illuminate\Http\Request;
use App\Models\JangkaWaktus; // Assuming JangkaWaktus model exists

class CalculatorController extends Controller
{
    public function calculate(Request $request)
    {

    $pokok_pinjaman = $request->input('pokokpinjaman');
    $nama_bank = $request->input('hitungnamabank');
    $jumlah_bunga = $request->input('hitungjumlahbunga');
    $rentang_waktu = $request->input('pilihjangkawaktu');

    $nama_bank = $request->input('hitungnamabank');
    $bankDetails = banks::find($nama_bank); // Asumsikan Anda memiliki model Bank

    $total_bunga = $pokok_pinjaman * ($jumlah_bunga / 100) ;
    $total_dibayarkan = $pokok_pinjaman + $total_bunga;
    $anguran = $total_dibayarkan / $rentang_waktu;

    // Siapkan data untuk ditampilkan di view
    $data = [
        'pokok_pinjaman' => $pokok_pinjaman,
        'nama_bank' => $nama_bank,
        'jumlah_bunga' => $jumlah_bunga,
        'rentang_waktu' => $rentang_waktu,
        'total_bunga' => $total_bunga,
        'total_dibayarkan' => $total_dibayarkan,
        'angsuran' => $anguran,
        'nama_bank_detail' => $bankDetails->nama_bank // Tambahkan kunci 'nama_bank_detail'
    ];

    return view('skema.modules.screen4.output', $data);
    }

    public function calculateUser(Request $request)
    {

    $pokok_pinjaman = $request->input('pokokpinjaman');
    $nama_bank = $request->input('hitungnamabank');
    $jumlah_bunga = $request->input('hitungjumlahbunga');
    $rentang_waktu = $request->input('pilihjangkawaktu');

    $total_bunga = $pokok_pinjaman * ($jumlah_bunga / 100) ;
    $total_dibayarkan = $pokok_pinjaman + $total_bunga;
    $anguran = $total_dibayarkan / $rentang_waktu;

    // Siapkan data untuk ditampilkan di view
    $data = [
        'pokok_pinjaman' => $pokok_pinjaman,
        'nama_bank' => $nama_bank,
        'jumlah_bunga' => $jumlah_bunga,
        'rentang_waktu' => $rentang_waktu,
        'total_bunga' => $total_bunga,
        'total_dibayarkan' => $total_dibayarkan,
        'angsuran' => $anguran
    ];

    return view('skema.modules.screen5.outputUser', $data);
    }
}
