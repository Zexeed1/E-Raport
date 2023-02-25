<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $fillable = ['kode_mapel','mapel','semester_id'];

    public function siswa()
    {
        return $this->belongsToMany(siswa::class, 'mapel_siswa')->withPivot(['kuis', 'ulangan', 'uts', 'performance', 'project', 'product', 'sikap','note'])->withTimestamps();
    }

    public function siswa2()
    {
        return $this->belongsToMany(siswa::class, 'mapel_siswa2')->withPivot(['uh1', 'uh2', 't1', 't2','t3', 't4', 'uts', 'uas', 'desk_p', 'proses', 'produk', 'pro1', 'pro2', 'desk_k'])->withTimestamps();
    }

    public function guru()
    {
        return $this->hasMany(guru::class);
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }

    public function nilai()
    {
        return $this->hasMany(nilai::class);
    }


    public function Semester()
    {
        return $this->belongsTo(Semester::class);
    }



}
