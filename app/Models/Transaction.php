<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'tx_ref',
        'user_id',
        'intake_id',
        'amount',
        'currency',
        'payment_status',
        'payment_method',
        'payment_reference',
        'payment_details',
        'paid_at'
    ];

    protected $casts = [
        'payment_details' => 'array',
        'paid_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function intake(): BelongsTo
    {
        return $this->belongsTo(Intake::class);
    }
} 