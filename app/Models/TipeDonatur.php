<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class TipeDonatur extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipe_donatur';
    protected $fillable = [
        'nama',
        'slug'
    ];

    public function donatur()
    {
        return $this->hasMany(Donatur::class);
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }
}