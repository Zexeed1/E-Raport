<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    protected $table = 'semester';
    protected $fillable = ['id', 'tahun_ajar', 'semester'];

    public function mapel()
    {
        return $this->hasMany(mapel::class);
    }
}
