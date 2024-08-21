<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tim_litabmas extends Model
{
    use HasFactory;
    protected $table = 'tim_litabmas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ["id_proposal", "nama", "tugas", "status_tim"];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'id_proposal');
    }
}