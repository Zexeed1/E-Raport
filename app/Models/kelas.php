<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = ['id', 'kelas'];


    public function mapel()
    {
        return $this->hasMany(Kelas::class);
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
