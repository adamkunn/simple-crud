<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {

        $data = Employee::all();
        // dd($data);
        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai(){

        
        return view('tambahdata');
    }

    public function insertdata (Request $request) {
        // dd($request->all());
        $validasidata = $request->validate([
            'nama' => 'required|string|max:255',
            'jeniskelamin' => 'required|in:cowo,cewe',
            'notelpon' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $data = Employee::create($validasidata);
        if($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilkandata ($id) {
        $data = Employee::find($id);
        // dd($data);

        return view('tampildata', compact('data'));
    }
    
    public function updatedata(Request $request, $id)
{
    $data = Employee::find($id);
    $data->update($request->except('foto'));

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = $file->getClientOriginalName();

        // Hapus foto lama jika ada
        if ($data->foto && file_exists(public_path('fotopegawai/' . $data->foto))) {
            unlink(public_path('fotopegawai/' . $data->foto));
        }

        // Pindahkan foto baru ke direktori 'fotopegawai' dalam direktori public
        $file->move(public_path('fotopegawai'), $filename);
        $data->foto = $filename;
        $data->save();
    }

    return redirect()->route('pegawai')->with('success', 'Data berhasil di Update');
}

    public function deletedata ($id) {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data berhasil di hapus');
    }


}
