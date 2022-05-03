<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penyedia()
    {
        return $this->belongsTo(Penyedia::class);
    }

    public function tiketPengaduan()
    {
        return $this->hasMany(Tiket::class);
    }
}
