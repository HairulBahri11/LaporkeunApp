<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';

    protected $guarded = ['id'];

    public function gurunya()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
