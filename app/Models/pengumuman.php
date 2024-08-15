<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumuman';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $casts = [
    'tanggal' => 'date:d-m-Y', // Atau cukup 'date' saja jika Anda ingin menggunakan format default
    ];
    protected $fillable = ['id_user','tanggal', 'judul', 'deskripsi', 'file', 'status' ];
    
    public function pengumuman()
    {
        return $this->belongsTo(Proposal::class, 'id');
    }
}