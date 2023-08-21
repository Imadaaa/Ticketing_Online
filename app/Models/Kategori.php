<?php

namespace App\Models;

use App\Models\Acara;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = [
        'nama'
    ];
    public $timestamps = false;

    public function acara()
    {
        return $this->hasMany(Acara::class);
    }

    public function getNamaAttribute($value)
    {
        return ucwords($value);
    }
}
