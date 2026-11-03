<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReviewReply extends Model
{
    protected $primaryKey = 'reply_id';

    protected $fillable = [
        'review_id',
        'responder_name',
        'reply',
    ];

    public function review(): BelongsTo
    {
        return $this->belongsTo(
            Review::class,
            'review_id',
            'review_id'
        );
    }
}
