<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Kegiatan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'kegiatan';
    protected $fillable = [
        'judul',
        'slug',
        'keterangan',
        'tanggal_kegiatan',
        'jenis_kegiatan',
        'nama_donatur',
        'bentuk_donasi',
        'sumber_donasi',
        'masuk_donasi',
        'keluar_donasi',
        'penanggung_jawab',
        'jumlah'
    ];



    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
