<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\{guru, mapel};

class GuruController extends Controller
{
    public function index()
    {
        $guru = guru::all();
        mapel::all();
        $gurus = guru::all();
        return view('admin.tbguru.guru', compact('guru', 'gurus'));
    }

    public function profile($id)
    {
        $guru = guru::find($id);
        return view('admin.tbguru.profile', compact('guru'));
    }

    public function add()
    {
        $guru = guru::all();
        $mapel = mapel::all();
        return view('admin.tbguru.add', compact('guru', 'mapel'));
    }

    public function simpan(Request $request)
    {
        $messages = [
            'required' => ':attribute Wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
        ];

        $this->validate($request, [
            'nama' => 'required|min:1|max:30',
            'alamat' => 'required',
            'agama' => 'required',
            'email' => 'required',
        ], $messages);
        //menambahkan Akun otomatis
        $user = new User();
        $user->role = 'Guru';
        $user->avatar = $request->avatar;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->remember_token = Str::random(60);
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->getClientOriginalName();
        }
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $guru = guru::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images', $request->file('avatar')->getClientOriginalName());
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }
        return redirect('/guru')->with('sukses', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $guru = guru::findOrFail($id);
        $mapel = mapel::all();
        return view('admin.tbguru.edit', compact('guru', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $guru = guru::find($id);
        $guru->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images', $request->file('avatar')->getClientOriginalName());
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }
        return redirect('/guru')->with('update', 'Data Berhasil Di Edit');
    }
    public function delete($id)
    {
        $guru = guru::find($id);
        if(!$guru){
            return redirect('/guru')->with('gagal', 'Data Tidak Ditemukan');
        }
        $guru->delete();
        return redirect('/guru')->with('delete', 'Data Berhasil di Hapus');
    }
}
