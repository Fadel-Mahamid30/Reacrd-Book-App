<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'shift',
        'jam_masuk',
        'jam_keluar'
    ];

    public function absensi(){
        $this->hasMany(Absensi::class, 'shift_id');
    }
}
