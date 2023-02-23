<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = kelas::all();
        return view('admin.tbkelas.kelas', compact('kelas'));
    }
    public function add(Request $request)
    {
        kelas::create($request->all());
        // dd($request);
        return redirect('/kelas');
    }
    public function delete($id)
    {
        $kelas = kelas::find($id);
        $kelas->delete();
        return redirect('/kelas')->with('delete', 'Data Berhasil di Hapus');
    }
}
