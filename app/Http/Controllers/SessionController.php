<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUserRequest;

class SessionController extends Controller
{
    public function index()
    {
        $semester = semester::where('kode', '666')->get();
        return view('auth.login',compact('semester'));
    }

    public function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password' => 'required'
        ],[
            'email.required'=>'Username Tidak Ada',
            'password.required' => 'Password wajib di isi'
        ]);

        $infologin =[
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($infologin)){
            return redirect('/')->with('sukses', Auth::User()->name.' Berhasil Login');
        }else{
            return redirect('login')->withErrors('Username atau password yang dimasukkan salah');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Anda Berhasil Logout');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|:unique:users',
            'password' => 'required|min:5'
        ], [
            'name.required' => 'Nama harus di isi terlebih dahulu',
            'email.required' => 'Username harus di isi terlebih dahulu',
            'email.email' => 'Silahkan check Username terlebih dahulu',
            'email.unique' => 'Username sudah ada, Silahkan masukkan Username yang lain',
            'password.required' => 'Password harus di isi terlebih dahulu',
            'password.min' => 'Password minimal 6 Karakter',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);
        $infologin = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infologin)) {
            return redirect('/')->with('sukses', Auth::User()->name . ' Berhasil Login');
        } else {
            return redirect('login')->withErrors('Email dan Password yang dimasukkan tidak valid');
        }
    }
    public function update()
    {
        return view('auth.password-update');
    }

    public function updateUser(UpdateUserRequest $request,$id)
    {
       $request->validate([
            'oldpassword' => 'required',
            'pasword' => 'required|confirmed',
       ]);
       $hashedPassword = Auth::user()->password;
       if (Hash::check($request->oldpassword,$hashedPassword)) {
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::logout();
        return redirect()->route('login')->with('berhasil', 'Password berhasil diganti (Jangan sampai lupa)');
       }else{
        return redirect()->back()->with('gagal', 'Password Salah');
       }
    }
}
