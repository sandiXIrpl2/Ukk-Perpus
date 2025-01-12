<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $table = 'tbl_rak';
    protected $primaryKey = 'id_rak';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'kode_rak',
        'rak',
        'keterangan',
    ];

    public function ddc()
    {
        return $this->hasMany(Ddc::class, 'id_rak');
    }
}
