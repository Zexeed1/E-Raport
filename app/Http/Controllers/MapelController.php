<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use App\Models\semester;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = mapel::all();

        return view('admin.tbmapel.mapel', compact('mapel'));
    }
    public function add(Request $request)
    {
        mapel::create($request->all());
        // dd($request);
        return redirect('/mapel');
    }
    public function delete($id)
    {
        $mapel = mapel::find($id);
        $mapel->delete();
        return redirect('/mapel')->with('delete', 'Data Berhasil di Hapus');
    }

    public function show()
    {
        $semester = semester::all();
        return view('tahunajar',compact('semester'));
    }

}
