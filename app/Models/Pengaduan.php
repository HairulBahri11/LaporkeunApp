<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pengaduan';

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id', 'id');
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id', 'id');
    }
}
