<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mapelsiswa extends Model
{
    protected $table = 'mapel_siswa';
    protected $fillable = ['id','siswa_id', 'mapel_id', 'kuis', 'ulangan', 'uts', 'performance', 'project', 'product', 'sikap', 'note'];
}
