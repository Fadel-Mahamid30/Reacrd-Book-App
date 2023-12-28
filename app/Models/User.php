<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;       
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'foto',
        'nama',
        'no_telepon',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'status',
        'divisi_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function divisi(){
        return $this->belongsTo(Divisi::class);
    }

    public function tanggal_logbook(){
        return $this->hasMany(Tanggal_pembuatan_logbook::class, 'user_id');
    }

    public function absensi(){
        return $this->hasMany(Absensi::class, 'user_id');
    }

    public function scopeSearch_user($query, array $filters)
    {
        $query->when($filters["search"] ?? false,  function($query, $search){
            return $query->where("nama", "like", "%". $search . "%")
                    ->orWhere("email", "like", "%". $search . "%");
        });

        $query->when($filters["select"] ?? false,  function($query, $select){
            return $query->whereHas("divisi", function($query) use ($select){
                $query->where("id", $select);
            });
        });
    }
}
