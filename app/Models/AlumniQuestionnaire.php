<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlumniQuestionnaire extends Model
{
    protected $fillable = [
        'user_id', 'masa_kerja', 'masa_tunggu', 'provinsi_kerja', 'kabupaten_kerja', 
        'instansi_kerja', 'gaji_utama', 'gaji_lembur', 'gaji_lainnya', 
        'sumber_dana', 'status_bekerja', 'keterangan_pekerjaan', 
        'hubungan_studi', 'tingkat_pendidikan_sesuai', 'pendapatan_utama', 
        'pendapatan_lembur', 'pendapatan_lainnya', 'waktu_kerja_detail'
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
