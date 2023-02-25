<?php

namespace App\Http\Controllers;


use App\Models\nilai;
use Illuminate\Http\Request;
use App\Models\{ mapel, mapelsiswa as ModelsMapelsiswa, siswa, semester};

class NilaiController extends Controller
{
    //-----------------------------------Nilai mid----------------------------------------//
    public function ajax(Request $request)
    {
        return $request->JSON('#tb');
    }
    public function index()
    {
        $siswa = siswa::where('kelas_id','1')->get();
        $siswa1 = siswa::where('kelas_id', '2')->get();
        $siswa2 = siswa::where('kelas_id', '3')->get();
        $semester = semester::all();
        return view('admin.tbmid.mid', compact('semester','siswa','siswa1','siswa2'));
    }

    public function berinilai($id)
    {
        $siswa = siswa::find($id);
        $matapelajaran = mapel::all();
        return view('admin.tbmid.lihatNilai', ['matapelajaran' => $matapelajaran, 'siswa' => $siswa]);
    }

    public function cetak($id)
    {
        $siswa = Siswa::find($id);
        $matapelajaran = Mapel::all();
        return view('admin.tbmid.cetak', ['siswa' => $siswa, 'matapelajaran' => $matapelajaran]);
    }

    public function cetakLedger($id)
    {
        $siswa = Siswa::all();
        $matapelajaran = Mapel::find($id);
        $map = Mapel::find($id);
        return view('admin.tbmid.cetak', ['siswa' => $siswa, 'matapelajaran' => $matapelajaran, 'map'=>$map]);
    }

    public function addNilai(Request $request, $id)
    {
        $siswa = siswa::findOrFail($id);
        $mapel = mapel::find($request->mapel_id);

        // menambahkan kembali relasi dengan data baru
        $siswa->mapel()->attach($mapel, ['kuis' => $request->kuis,'ulangan' => $request->ulangan,'uts' => $request->uts,'performance' => $request->performance, 'project' => $request->project, 'product' => $request->product, 'sikap' => $request->sikap, 'note' => $request->note]);
        return redirect()->back()->with('success', 'Data nilai berhasil di input');
    }

    public function updateNilai(Request $request, $id)
    {
        $siswa = siswa::findOrFail($id);
        $mapel = mapel::find($request->mapel_id);
        $siswa->mapel()->updateExistingPivot($mapel, ['kuis' => $request->kuis, 'ulangan' => $request->ulangan, 'uts' => $request->uts, 'performance' => $request->performance, 'project' => $request->project, 'product' => $request->product, 'sikap' => $request->sikap, 'note' => $request->note]);
        return redirect()->back()->with('berhasil', 'Data nilai berhasil di update');
    }


    //---------------------------------Nilai Semester-------------------------------------//
    public function pengetahuan()
    {
        $mapel = mapel::all();
        return view('admin.tbsem.pengetahuan.pengetahuan',compact('mapel'));
    }
    public function kelas7($id)
    {
        $mapel = mapel::find($id);
        $siswa = siswa::where('kelas_id', '1')->get();
        $semester = semester::where('id','2')->get();
        return view('admin.tbsem.pengetahuan.kelas7', compact('mapel','siswa','semester'));
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -//
    public function kelas8($id)
    {
        $mapel = mapel::find($id);
        $siswa = siswa::where('kelas_id', '2')->get();
        $semester = semester::where('id', '2')->get();
        return view('admin.tbsem.pengetahuan.kelas8', compact('mapel', 'siswa', 'semester'));
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -//
    public function kelas9($id)
    {
        $mapel = mapel::find($id);
        $siswa = siswa::where('kelas_id', '3')->get();
        $semester = semester::where('id', '2')->get();
        return view('admin.tbsem.pengetahuan.kelas9', compact('mapel', 'siswa', 'semester'));
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -//

    public function show()
    {
        $siswa = siswa::where('kelas_id', '1')->get();
        $siswa1 = siswa::where('kelas_id', '2')->get();
        $siswa2 = siswa::where('kelas_id', '3')->get();
        $nilai = nilai::all();
        return view('admin.tbsem.index',compact('siswa','siswa1','siswa2','nilai'));
    }

    public function kasihNilai($id)
    {
        $siswa = siswa::find($id);
        $matapelajaran = mapel::all();
        $nilai = nilai::all();
        return view('admin.tbsem.valueLook', ['matapelajaran' => $matapelajaran, 'siswa' => $siswa, 'nilai' => $nilai]);
    }

    public function tambahNilai(Request $request, $id)
    {
        $siswa = siswa::findOrFail($id);
        $mapel = mapel::find($request->mapel_id);

        // menambahkan kembali relasi dengan data baru
        $siswa->mapel2()->attach($mapel, ['pa' => $request->pa, 'dp' => $request->dp, 'ka' => $request->ka, 'dk' => $request->dk]);
        return redirect()->back()->with('success', 'Data nilai berhasil di input');
    }

    public function editNilai(Request $request, $id)
    {
        $siswa = siswa::findOrFail($id);
        $mapel = mapel::find($request->mapel_id);

        // menambahkan kembali relasi dengan data baru
        $siswa->mapel2()->updateExistingPivot($mapel, ['pa' => $request->pa, 'dp' => $request->dp, 'ka' => $request->ka, 'dk' => $request->dk]);
        return redirect()->back()->with('berhasil', 'Data nilai berhasil di update');
    }

    public function print($id)
    {
        $siswa = Siswa::find($id);
        $mapel = Mapel::all();
        $semester = semester::where('id', '1')->get();
        $semester2 = semester::where('id', '2')->get();
        return view('admin.tbsem.cetak', ['siswa' => $siswa, 'mapel' => $mapel, 'semester' => $semester, 'semester2' => $semester2]);
    }




    //----------------------------------Nilai Sikap---------------------------------------//
    public function sikap()
    {
        $siswa = siswa::where('kelas_id', '1')->get();
        $siswa1 = siswa::where('kelas_id', '2')->get();
        $siswa2 = siswa::where('kelas_id', '3')->get();
        return view('admin.tbsem.sikap.sikap', compact('siswa', 'siswa1', 'siswa2'));
    }
    public function update(Request $request, $id)
    {
        $siswa = siswa::find($id);
        $siswa->update($request->all());
        return redirect('/nilai-sikap')->with('update', 'Data Berhasil Di Edit');
    }
}
