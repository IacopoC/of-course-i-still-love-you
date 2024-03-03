<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Updown extends Model
{
    use HasFactory;
    protected $fillable = ['updown','message_id','user_id'];

    public function up($messageId, $userId): void
    {
        $this->message_id = $messageId;
        $this->user_id = $userId;
        $this->updown = 'up';
        $this->save();
    }

    public function down($messageId, $userId): void
    {
        $this->message_id = $messageId;
        $this->user_id = $userId;
        $this->updown = 'down';
        $this->save();
    }

    public function messages(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }
}
