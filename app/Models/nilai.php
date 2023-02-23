<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $fillable = ['id','siswa_id','mapel_id', 'pa', 'dp', 'ka', 'dk'];

    public function siswa()
    {
        return $this->belongsTo(siswa::class);
    }

    public function mapel()
    {
        return $this->belongsTo(mapel::class);
    }
}
