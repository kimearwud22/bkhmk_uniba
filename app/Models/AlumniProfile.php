<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlumniProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nim',
        'prodi',
        'tahun_angkatan',
        'tahun_lulus',
        'jenis_kelamin',
        'no_telepon',
        'alamat',
        'cv_path',
    ];
    
    // Relationship: AlumniProfile belongs to a User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}