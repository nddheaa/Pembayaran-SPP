<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Biaya as Model;
use Illuminate\Support\Facades\Storage;


class BiayaController extends Controller
{
    private $viewIndex='biaya_index';
    private $viewCreate='biaya_form';
    private $viewEdit='biaya_form';
    private $viewShow='biaya_show';
    private $routePrefix='biaya';


    public function index(Request $request)
    {
        if($request->filled('q')){
            $models = Model::with('user')->search($request->q)->paginate(50);
        } else{
            $models = Model::with('user')->latest()->paginate(50);
        }
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
        $data = [
            'model' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix.'.store',
            'button' =>'SIMPAN',
            'title' => 'FORM DATA BIAYA',
        ];
        return view('operator.'.$this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required|unique:biayas,nama',
            'jumlah' =>'required',
        ]);
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
            'title' => 'FORM DATA BIAYA',
        ];
        return view('operator.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|unique:biayas,nama,' . $id,
            'jumlah' =>'required',
            // 'jumlah' =>'required|numeric',
        ]);
        
        $model = Model::findOrFail($id);
        $model->fill($requestData);
        $model ->save();
        flash('Data Berhasil Disimpan');
        return redirect()->route('biaya.index');
    }

    // protected function prepareForValidation(): void
    // {
    //     $this->merge([
    //         'jumlah' => str_replace('.', '', $this->jumlah),
    //     ]);
    // }
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