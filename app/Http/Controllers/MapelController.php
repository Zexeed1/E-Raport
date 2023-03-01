<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\mapel;
use App\Models\semester;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = mapel::all();
        $guru = guru::all();
        $mapels = mapel::all();
        $mapel->load('guru');
        return view('admin.tbmapel.mapel', compact('mapel','guru','mapels'));
    }
    public function add(Request $request)
    {
        mapel::create($request->all());
        return redirect('/mapel');
    }
    public function update(Request $request,$id)
    {
        $mapel = mapel::find($id);
        $mapel->update($request->all());
        return redirect('/mapel')->with('update', 'Data Berhasil di Update');
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
        $semesters = semester::all();
        return view('tahunajar',compact('semester','semesters'));
    }
    public function updateSemester(Request $request, $id)
    {
        $semesters = semester::find($id);
        $semesters->update($request->all());
        // dd($request->all());
        return redirect('/TA-semester')->with('update', 'Data Semester Berhasil di update');
    }

}
