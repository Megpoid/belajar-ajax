<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali_Kelas extends Model
{
    protected $table = 'wali_kelas';
    
    protected $fillable = [
        'nama_wali',
    ];

    public function murid()
    {
        return $this->hasMany('App\Murid');
    }
}
