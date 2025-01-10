<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class StatusKeanggotaan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'status_keanggotaan';
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