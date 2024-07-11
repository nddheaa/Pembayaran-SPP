<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;

class KartuSppController extends Controller
{
    public function index(Request $request)
    {
        $tagihan = Tagihan::where('siswa_id', $request->siswa_id)->get();
        $detailsiswa = $tagihan->first()->detailsiswa;
        return view('operator.kartuspp_index', [
            'tagihan' => $tagihan,
            'detailsiswa' => $detailsiswa
        ]);
    }
}
