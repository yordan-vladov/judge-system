<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Problem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [ 'title','language','topic_id','difficulty','description','solution','inputs','outputs'];


    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}
