<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Donatur extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'donatur';
    protected $fillable = [
        'nama',
        'slug',
        'no_telepon',
        'no_whatsapp',
        'alamat',
        'tipe_donaturs_id',
        'status_keanggotaans_id',
        'tanggal_gabung',
        'tanggal_lahir',
        'kota_lahir',
        'kelurahan',
        'kecamatan',
        'kode_pos',
        'provinsi'
    ];

    public function tipedonatur()
    {
        return $this->belongsTo(TipeDonatur::class, 'tipe_donaturs_id');
    }

    public function statuskeanggotaan()
    {
        return $this->belongsTo(StatusKeanggotaan::class, 'status_keanggotaans_id');
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }
}