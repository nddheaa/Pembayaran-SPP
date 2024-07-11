<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User as Model;

class UserController extends Controller
{
    private $viewIndex='user_index';
    private $viewCreate='user_form';
    private $viewEdit='user_form';
    private $routePrefix='user';


    public function index()
    {
        
        return view ('operator.'. $this->viewIndex, [
            'models' => Model::where('akses','<>','siswa')
                ->latest()
                ->paginate(50),
                'routePrefix' => $this->routePrefix,
                'title' => 'Data User',
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
            'title' => 'FORM DATA USER',
        ];
        return view('operator.'.$this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' =>'required',
            'email' => 'required|unique:users,email',
            'no_hp' => 'required|unique:users,no_hp',
            'akses' => 'required|in:operator,admin',
            'password' =>'required',
        ]);

        $requestData['password'] = bcrypt($requestData['password']);
        $requestData['email_verified_at'] = now(); 
        Model::create($requestData);
        flash('Data Berhasil Disimpan');
        return back();
    }

    public function edit(string $id)
    {
        $data = [
            'model' => Model::findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix.'.update', $id],
            'button' =>'UPDATE',
            'title' => 'FORM DATA USER',
        ];
        return view('operator.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'name' =>'required',
            'email' => 'required|unique:users, email,' . $id,
            'no_hp' => 'required|unique:users, no_hp,' . $id,
            'password' =>'nullable',
        ]);
        $model = Model::findOrFail($id);
        if($requestData['password'] == "")
        {
            unset($requestData['password']);
        }else{
            $requestData['password'] = bcrypt($requestData['password']);
        }
        $model->fill($requestData);
        $model ->save();
        flash('Data Berhasil Diubah');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Model::findOrFail($id);
        if($model->id == 2 ){
            flash('Data Tidak Bisa Dihapus')->error();
            return back ();
        }
        $model -> delete();
        flash('Data Berhasil Dihapus');
        return back();
    }


}
