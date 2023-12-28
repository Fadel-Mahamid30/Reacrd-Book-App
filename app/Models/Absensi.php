<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'status_absensi',
        'tempat_kerja',
        'shift_id',
        'jam_masuk',
        'jam_keluar',
        'latitude',
        'longitude',
        'terlambat',
        'user_id'
    ];

    public function shift(){
        return $this->belongsTo(Shift::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearch_absensi($query, array $filters){
        $query->when($filters["bulan"] ?? false,  function($query, $bulan){
            return $query->whereMonth("tanggal", $bulan);
        });

        $query->when($filters["tahun"] ?? false,  function($query, $tahun){
            return $query->whereYear("tanggal", $tahun);
        });

        $query->when($filters["user_id"] ?? false,  function($query, $user_id){
            return $query->where("user_id", $user_id);
        });

        // $query->when($filters["status_absesnsi"] ?? false, function($query, $status){
        //     return $query->where("status_absesnsi", "like", "%" . $status . "%");
        // });

        // $query->when($filters["search"] ?? false,  function($query, $search){
        //     return $query->whereHas("user", function($query) use ($search){
        //         $query->where("nama", "like", "%" . $search . "%");
        //     });
        // });
    }
    
}
