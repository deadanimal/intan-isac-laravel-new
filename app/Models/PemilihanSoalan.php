<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilihanSoalan extends Model
{
    use HasFactory;

    protected $table = 'pro_pemilihan_soalan';
    protected $primaryKey = 'ID_PEMILIHAN_SOALAN';
}
