<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Updown extends Model
{
    use HasFactory;
    protected $fillable = ['updown_message','updown'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
