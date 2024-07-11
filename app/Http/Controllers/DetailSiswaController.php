<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DetailSiswa as Model;
use Illuminate\Support\Facades\Storage;


class DetailSiswaController extends Controller
{
    private $viewIndex='detailsiswa_index';
    private $viewCreate='detailsiswa_form';
    private $viewEdit='detailsiswa_form';
    private $viewShow='detailsiswa_show';
    private $routePrefix='detailsiswa';


    public function index(Request $request)
    {
        if($request->filled('i')){
            $models = Model::search($request->q)->paginate(50);
        } else{
            $models = Model::latest()->paginate(50);
        }
        return view ('operator.'. $this->viewIndex, [
        'models' => $models,
        'routePrefix' => $this->routePrefix,
        'title' => 'Data Siswa',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'model' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix.'.store',
            'button' =>'SIMPAN',
            'title' => 'FORM DATA SISWA',
            'detailsiswa' => User::where('akses','siswa')->pluck('name','id'),
        ];
        return view('operator.'.$this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'siswa_id' =>'nullable',
            'nama' => 'required',
            'nisn' => 'required|unique:detail_siswas',
            'jurusan' =>'required',
            'kelas' =>'required',
            'angkatan' =>'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        // $pathFoto = $request->file('foto')->store('public');
        // $pathFoto = null;
        // if ($request->hasFile('foto')) {
        //     $pathFoto = $request->file('foto')->store('public');
        // }
        if($request->hasFile('foto')){
            $requestData['foto'] = $request->file('foto')->store('public');
        }
        if($request->filled('siswa_id')){
            $requestData['siswa_status'] = 'aktif';
        }
        $requestData['user_id'] = auth()->user()->id;
        Model::create($requestData);
        flash('Data Berhasil Disimpan');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model =Model::findOrFail($id);
        return view ('operator.' .$this->viewShow, [
            'model' => $model,
            'title' => 'Detail Siswa'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'model' => Model::findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix.'.update', $id],
            'button' =>'UPDATE',
            'title' => 'FORM DATA SISWA',
            'detailsiswa' =>User::where('akses', 'siswa')->pluck('name', 'id')
        ];
        return view('operator.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'no_hp' => 'required|unique:detail_siswas,no_hp,' . $id,
            'siswa_id' =>'nullable',
            'nama' => 'required',
            'nisn' => 'required|unique:detail_siswas,nisn,' . $id,
            'jurusan' =>'required',
            'kelas' =>'required',
            'angkatan' =>'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $model = Model::findOrFail($id);
        
        if($request->hasFile('foto')){
            Storage::delete($model->foto);
            $requestData['foto'] = $request->file('foto')->store('public/storage');
        }
        if($request->filled('siswa_id')){
            $requestData['siswa_status'] = 'ok';
        }

        $requestData['user_id'] = auth()->user()->id;
        $model->fill($requestData);
        $model ->save();
        flash('Data Berhasil Disimpan');
        return redirect()->route('detailsiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Model::firstOrfail();
        $model -> delete();
        flash('Data Berhasil Dihapus');
        return back();
    }


}