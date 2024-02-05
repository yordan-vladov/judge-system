<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title'
    ];

    public function topics():HasMany
    {
        return $this->hasMany(Topic::class);
    }
}
