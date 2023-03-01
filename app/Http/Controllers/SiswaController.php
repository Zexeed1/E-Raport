<?php

namespace App\Http\Controllers;

use App\Models\{User, siswa, mapel ,kelas};
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = siswa::all();
        kelas::all();
        return view('admin.tbsiswa.siswa',compact('siswa'));
    }

    public function profile($id)
    {
        $siswa = siswa::find($id);
        $mapel = mapel::all();
        //Data Untuk Chart
        $categories = [];
        $data = [];
        foreach ($mapel as $mp) {
            $categories[] = $mp->mapel;
            $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->uts;
        }
        $kategori = [];
        $dataa = [];
        foreach ($mapel as $mata){
            $kategori[] = $mata->mapel;
            $dataa[] = $siswa->mapel2()->wherePivot('mapel_id',$mata->id)->first()->pivot->uas;
        }
        // dd($data);
        return view('admin.tbsiswa.profile', compact('siswa','mapel','categories', 'data','kategori','dataa'));
    }

    public function add()
    {
        $siswa = siswa::all();
        $kelas = kelas::all();
        return view('admin.tbsiswa.add',compact('siswa', 'kelas'));
    }

    public function simpan(Request $request)
    {
        $messages = [
            'required' => ':attribute * Wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
        ];

        $this->validate($request, [
            'nama' => 'required|min:1|max:30',
            'nis' => 'required|numeric',
            'agama' => 'required',
            'email' => 'required',
        ], $messages);


        $user = new User();
        $user->role = 'Siswa';
        $user-> avatar = $request->avatar;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->remember_token = Str::random(60);
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->getClientOriginalName();
        }
        $user->save();
        $siswa = siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $siswa = siswa::findOrFail($id);
        $kelas = kelas::all();
        return view('admin.tbsiswa.edit', compact('siswa','kelas'));
    }

    public function update(Request $request,$id)
    {
        $siswa = siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('update', 'Data Berhasil Di Edit');
    }
    public function delete($id)
    {
        $siswa = Siswa::find($id);
        if(!$siswa){
            return redirect('/siswa')->with('gagal', 'Data Tidak ditemukan');
        }
        $siswa->delete();
        return redirect('/siswa')->with('delete','Data Berhasil di Hapus');
    }

    public function checkRanking()
    {
        return view('admin.tbuser.ranking');
    }

}
