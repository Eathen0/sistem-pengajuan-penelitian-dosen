<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $table = 'proposals';
    protected $primaryKey = 'id';
    public $timestamps = true;
    

    protected $fillable = [
        'user_nidn',
        'id_skema',
        'judul',
        'nama_mitra',
        'alamat_mitra',
        'kata_kunci',
        'latar_belakang',
        'ringkasan',
        'urgensi',
        'rumusan_masalah',
        'pendekatan_pemecahan_masalah',
        'kebaruan',
        'metode_penelitian',
        'jadwal_penelitian',
        'daftar_pustaka',
        'status',
        'status_approvel',
        'nilai',
        'tanggal_submit',
        'approvel_date',
        'laporan_progress',
        'laporan_akhir',
        'updated_at',
        'created_at',
    ];

    protected $dates = [
        'tanggal_submit',
        'approvel_date',
        'updated_at',
        // tanggal lainnya...
    ];

    // Status Constants
    const STATUS_SUBMITTED = 'submitted';
    const STATUS_ACCEPTED = 'diterima';
    const STATUS_REJECTED = 'ditolak';

    // Retrieve Statuses
    public static function getStatuses()
    {
        return [
            self::STATUS_SUBMITTED => 'Submitted',
            self::STATUS_ACCEPTED => 'Diterima',
            self::STATUS_REJECTED => 'Ditolak',
        ];
    }

    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_nidn', 'nidn');
    }

    public function skema()
    {
        return $this->hasOne(skema_penelitian::class, 'id', 'id_skema');
    }

}