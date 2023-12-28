<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook_notes extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_kerja',
        'deskripsi',
        'logbook_dibuat_id'
    ];

    public function pembuatan_logbook(){
        return $this->belongsTo(Tanggal_pembuatan_logbook::class);
    }
}
