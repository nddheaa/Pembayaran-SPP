<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Biaya;
// use App\Models\Tagihan;
use App\Models\DetailSiswa;
use Illuminate\Http\Request;
use App\Models\Tagihan as Model;
use App\Http\Requests\StoreTagihanRequest;
use App\Http\Requests\UpdateTagihanRequest;
use App\Models\Pembayaran;
use App\Models\TagihanDetail;

class TagihanController extends Controller
{
    private $viewIndex='tagihan_index';
    private $viewCreate='tagihan_form';
    private $viewEdit='tagihan_form';
    private $viewShow='tagihan_show';
    private $routePrefix='tagihan';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->filled('bulan') && $request->filled('tahun')){
            $models = Model::latest()
            ->whereMonth('tanggal_tagihan', $request->bulan)
            ->whereYear('tanggal_tagihan', $request->tahun)
            ->paginate(50);
        } else{
            $models = Model::latest()->paginate(50);
        }
        return view ('operator.'. $this->viewIndex, [
        'models' => $models,
        'routePrefix' => $this->routePrefix,
        'title' => 'Data Tagihan',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detailsiswa = DetailSiswa::all();
        $data = [
            'model' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix.'.store',
            'button' =>'SIMPAN',
            'title' => 'FORM DATA TAGIHAN',
            'angkatan' => $detailsiswa->pluck('angkatan', 'angkatan'),
            'kelas' => $detailsiswa->pluck('kelas', 'kelas'),
            'nisn' => $detailsiswa->pluck('nisn', 'nisn'),
            'biaya' => Biaya::get(),
        ];
        return view('operator.'.$this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagihanRequest $request)
    {
        $requestData = $request->validated();
        $biayaIdArray = $requestData['biaya_id'];
        // $biayaIdArray = $requestData['biaya_id'] ?? [];
    
        $detailsiswa = DetailSiswa::query();
    
        if ($requestData['kelas'] != '') {
            $detailsiswa->where('kelas', $requestData['kelas']);
        }
        if ($requestData['angkatan'] != '') {
            $detailsiswa->where('angkatan', $requestData['angkatan']);
        }
        $detailsiswa = $detailsiswa->get();
        foreach ($detailsiswa as $itemSiswa) {
            $biaya = Biaya::whereIn('Id', $biayaIdArray)->get();
            unset($requestData['biaya_id']);
            $requestData['siswa_id'] = $itemSiswa->id;
            
            $requestData['status'] = 'baru';
            $tanggalTagihan = Carbon::parse($requestData['tanggal_tagihan']);
            $bulanTagihan =$tanggalTagihan->format('m');
            $tahunTagihan =$tanggalTagihan->format('Y');
            $cekTagihan = Model::where('siswa_id', $itemSiswa->id)
                ->whereMonth('tanggal_tagihan', $bulanTagihan)
                ->whereYear('tanggal_tagihan', $tahunTagihan)
                ->first();
        if($cekTagihan == null) {
        $tagihan = Model::create($requestData);
        foreach($biaya as $itemBiaya) {
            // dd($itemBiaya);
            $detail = TagihanDetail::create([
                'tagihan_id'=>$tagihan->id, 
                'nama_biaya'=>$itemBiaya->nama,
                'jumlah_biaya'=>$itemBiaya->jumlah,
            ]);
        }
        }

    }
            flash("Data Tagihan Berhasil Disimpan")->success();
            return back();

        }
    
    
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $tagihan = Model::with('pembayaran')->findOrFail($id);
        $data['tagihan'] = $tagihan;
        $data['detailsiswa'] = $tagihan->detailsiswa;
        $data['periode'] = Carbon::parse($tagihan->tanggal_tagihan)->translatedFormat('F Y');
        $data['model'] = new Pembayaran();
        return view('operator.' . $this->viewShow, $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Model $tagihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagihanRequest $request, Model $tagihan)
    {
        $model = Model::findOrFail();
        $model ->save();
        flash('Data Berhasil Disimpan');
        return redirect()->route('tagihan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Model $tagihan)
    {
        $model = Model::firstOrfail();
        $model -> delete();
        flash('Data Berhasil Dihapus');
        return back();
    }

}