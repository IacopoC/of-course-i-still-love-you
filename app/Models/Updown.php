<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Updown extends Model
{
    use HasFactory;
    protected $fillable = ['updown','message_id','user_id'];

    public function up($messageId, $userId): void
    {
        $this->message_id = $messageId;
        $this->user_id = $userId;
        $this->type = 'up';
        $this->save();
    }

    public function down($messageId, $userId): void
    {
        $this->message_id = $messageId;
        $this->user_id = $userId;
        $this->type = 'down';
        $this->save();
    }
}
