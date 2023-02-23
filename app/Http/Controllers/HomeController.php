<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use App\Models\mapel;
use App\Models\siswa;
use App\Models\semester;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        $siswa = siswa::all();
        $guru = guru::all();
        $mapel = mapel::all();
        $semester = semester::all();
        return view('welcome', compact('user','siswa', 'guru','mapel', 'semester'));
    }
}
