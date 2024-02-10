<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubmission extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'user_id','problem_id','solution','score','details'
    ];
}
