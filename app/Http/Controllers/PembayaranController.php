<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Tagihan;

class PembayaranController extends Controller
{
    private $viewIndex='pembayaran_index';
    private $routePrefix='pembayaran';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->filled('q')){
            $models = Pembayaran::with('user')->search($request->q)->paginate(50);
        } else{
            $models = Pembayaran::with('user')->latest()->paginate(50);
        }
        $models = Pembayaran::all();
        return view ('operator.'. $this->viewIndex, [
            'models' => $models,
        'routePrefix' => $this->routePrefix,
        'title' => 'Data Biaya',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembayaranRequest $request)
    {
        $requestData = $request->validated();
        $requestData['status_konfirmasi'] = 'sudah';
        $requestData['metode_pembayaran'] = 'manual';
        $tagihan = Tagihan::findOrfail($requestData['tagihan_id']);
        $totalBillAmount = $tagihan->tagihanDetails->sum('jumlah_biaya');
        $paidAmount = $tagihan->pembayaran->sum('jumlah_dibayar');
        
        if ($requestData['jumlah_dibayar'] >= $totalBillAmount) {
            $tagihan->status = 'lunas';
        } elseif ($tagihan->status === 'angsur' && ($totalBillAmount - $paidAmount) == $requestData['jumlah_dibayar']) {
            $tagihan->status = 'lunas';
        } else {
            $tagihan->status = 'angsur';
        }        
        $requestData['siswa_id'] = $tagihan->siswa_id;
        $tagihan->save();
        Pembayaran::create($requestData);
        flash('Pembayaran Berhasil Disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Pembayaran::firstOrfail();
        $model -> delete();
        flash('Data Berhasil Dihapus');
        return back();
    }
}
