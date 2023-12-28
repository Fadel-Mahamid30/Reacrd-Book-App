<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggal_pembuatan_logbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_dibuat',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function logbook_notes(){
        return $this->hasMany(Logbook_notes::class, "logbook_dibuat_id");
    }

    public function scopeSearch_logbook($query, array $filters){
        $query->when($filters["bulan"] ?? false,  function($query, $bulan){
            return $query->whereMonth("tanggal_dibuat", $bulan);
        });

        $query->when($filters["tahun"] ?? false,  function($query, $tahun){
            return $query->whereYear("tanggal_dibuat", $tahun);
        });
        
        $query->when($filters["user_id"] ?? false,  function($query, $user_id){
            return $query->where("user_id", $user_id);
        });
        
        $query->when($filters["search"] ?? false,  function($query, $search){
            return $query->whereHas("user", function($query) use ($search){
                $query->where("nama", "like", "%" . $search . "%");
            });
        });
    }
    
}
