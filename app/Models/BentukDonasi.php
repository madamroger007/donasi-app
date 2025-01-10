<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class BentukDonasi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bentuk_donasi';

    protected $fillable = [
        'nama',
        'slug'
    ];

    // Relationship with the Kegiatan model
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }

    // Mutator to automatically set the 'slug' attribute when 'nama' is set
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}