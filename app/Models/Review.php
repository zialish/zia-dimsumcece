<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Review extends Model
{
    protected $primaryKey = 'review_id';

    protected $fillable = [
        'product_id',
        'customer_name',
        'rating',
        'comment',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(
            Product::class,
            'product_id',
            'product_id'
        );
    }

    public function reply(): HasOne
    {
        return $this->hasOne(
            ReviewReply::class,
            'review_id',
            'review_id'
        );
    }
}
