<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $table ='guru';
    protected $fillable = ['id', 'user_id','nama', 'jeniskelamin', 'nohp', 'alamat', 'mapel_id', 'agama', 'email', 'avatar'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
    public function guru()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
