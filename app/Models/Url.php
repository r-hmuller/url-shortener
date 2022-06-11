<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Url extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['full_url', 'shorten_url'];

    public function clicks() {
        return $this->hasMany(Click::class);
    }
}
