<?php

namespace App\Models;

use App\Models\Acara;
use App\Models\Tiket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisTiket extends Model
{
    use HasFactory;

    protected $table = 'jenis_tiket';
    protected $fillable = [
        'acara_id',
        'is_free',
        'keuntungan'
    ];
    public $timestamps = false;

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'acara_id');
    }

    public function tiket()
    {
        return $this->hasMany(Tiket::class);
    }

    public function tiketBerbayarStartFrom()
    {
        return $this->hasOne(Tiket::class)->orderBy('harga', 'asc');
    }
}
