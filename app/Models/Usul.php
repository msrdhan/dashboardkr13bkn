<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usul extends Model
{
    use HasFactory;
    protected $table = 'usul';

    public function usulPegawai()
    {
        return $this->hasMany(UsulPegawai::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
