<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan_Detail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pengaduan_detail';

    public function faq()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id', 'id');
    }

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'pengaduan_id', 'id');
    }
}
