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
    protected $fillable = ['tanggal_pengumuman', 'judul', 'deskripsi', 'file', 'status', 'user_id' ];
    protected $casts = [
        'tanggal' => 'datetime',
    ];
    
    public function pengumuman()
    {
        return $this->belongsTo(Proposal::class, 'id');
    }
}