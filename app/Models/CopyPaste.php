<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CopyPaste extends Model
{
    protected $fillable = ['content'];
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
