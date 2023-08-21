<?php

namespace App\Models;

use App\Models\JenisTiket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';
    protected $fillable = [
        'jenis_tiket_id',
        'kode',
        'tier',
        'kursi',
        'harga'
    ];

    public function jenisTiket()
    {
        return $this->belongsTo(JenisTiket::class, 'jenis_tiket_id');
    }
}
