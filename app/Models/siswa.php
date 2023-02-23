<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    // use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['nama', 'nis', 'jk', 'kelas_id', 'agama', 'email', 'alamat','avatar','spiritual', 'sosial','izin','sakit','alpha'];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {
        return $this->belongsToMany(mapel::class, 'mapel_siswa')->withPivot(['kuis', 'ulangan', 'uts', 'performance', 'project', 'product', 'sikap','note'])->withTimestamps();
    }

    public function mapel2()
    {
        return $this->belongsToMany(mapel::class, 'mapel_siswa2')->withPivot(['pa', 'dp', 'ka', 'dk'])->withTimestamps();
    }

    public function nilai()
    {
        return $this->hasMany(nilai::class);
    }

    public function RataRataPP()
    {
        foreach ($this->mapel as $mapel) {
            $totnilai = $mapel->pivot->kuis + $mapel->pivot->ulangan;
            $rata = $totnilai / 2;
        }
        return round($rata);
    }

    public function NilaiAkhirPP()
    {
        //ambil nilai

        $rata = 0;


        foreach ($this->mapel as $mapel) {
            $totnilai = $mapel->pivot->kuis + $mapel->pivot->ulangan;

            $rata = $totnilai / 2;
        }
        $nilaiakhir = $rata+ $mapel->pivot->uts/20;
        return round($nilaiakhir);
    }

    public function Total()
    {
        //ambil nilai
        $total = 0;



        foreach ($this->mapel as $mapel) {
            $totnilai = $mapel->pivot->kuis/10 + $mapel->pivot->ulangan/10 + $mapel->pivot->uts/10 + $mapel->pivot->performance/10 + $mapel->pivot->project/10 + $mapel->pivot->product/10 + $mapel->pivot->sikap/10;
            $total += $totnilai;

        }
        return round($total);
    }
    public function NilaiMID()
    {
        //ambil nilai
        $total = 0;



        foreach ($this->mapel as $mapel) {
            $totnilai = $mapel->pivot->kuis / 10 + $mapel->pivot->ulangan / 10 + $mapel->pivot->uts / 10 + $mapel->pivot->performance / 10 + $mapel->pivot->project / 10 + $mapel->pivot->product / 10 + $mapel->pivot->sikap / 10;
            $total += $totnilai;

        }
        return round($total);
    }


    public function Predikat()
    {
        foreach ($this->mapel as $jum) {
            $nilai1 = $jum->pivot->total();
            if ($nilai1 == "") {
                echo "";
            } else if ($nilai1 >= 0 && $nilai1 <= 49) {
                echo 'E';
            } else if ($nilai1 >= 50 && $nilai1 <= 59) {
                echo 'D';
            } else if ($nilai1 >= 60 && $nilai1 <= 69) {
                echo 'C';
            } else if ($nilai1 >= 70 && $nilai1 <= 79) {
                echo 'B';
            } else if ($nilai1 >= 80 && $nilai1 <= 100) {
                echo 'A';
            }
        }
        return $nilai1;
    }

    public function ranking()
    {
       foreach($this->mapel as $mapel)
       {

       }
    }

}
