<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /** Payment status constants */
    public const STATUS_PENDING    = 'pending';
    public const STATUS_SUCCEEDED  = 'succeeded';
    public const STATUS_FAILED     = 'failed';
    public const STATUS_CANCELED   = 'canceled';
    public const STATUS_PROCESSING = 'processing';

    /** Admin review status */
    public const ADMIN_NEW      = 'new';
    public const ADMIN_APPROVED = 'approved';
    public const ADMIN_REJECTED = 'rejected';

    protected $fillable = [
        'package_id', 'user_id', 'agent_id',
        'customer_name', 'customer_email', 'customer_phone',
        'departure_date', 'pricing_mode', 'gateway',
        'travelers', 'rooms',
        'currency', 'total_amount_cents',
        'payment_intent_id', 'payment_status', 'paid_at',
        'extras',
        'invoice_number', 'invoice_pdf_path',
        'payment_method_brand', 'payment_method_last4', 'receipt_url',

        // admin workflow
        'admin_status', 'approved_at', 'rejected_at', 'admin_notes',
    ];

    protected $casts = [
        'departure_date'      => 'date',
        'paid_at'             => 'datetime',
        'approved_at'         => 'datetime',
        'rejected_at'         => 'datetime',
        'extras'              => 'array',
        'travelers'           => 'integer',
        'rooms'               => 'integer',
        'total_amount_cents'  => 'integer',
    ];

    protected $attributes = [
        'payment_status' => self::STATUS_PENDING,
        'admin_status'   => self::ADMIN_NEW,
    ];

    protected $appends = [
        'total_formatted',
        'masked_card',
    ];

    /* ---------------- Relationships ---------------- */

    public function package()
    {
        return $this->belongsTo(\App\Models\Package::class);
    }

    public function user()
    {
        // may be null if guest checkout
        return $this->belongsTo(\App\Models\User::class);
    }

    public function agent()
    {
        return $this->belongsTo(\App\Models\User::class, 'agent_id');
    }

    /* ---------------- Accessors ---------------- */

    public function getTotalFormattedAttribute(): string
    {
        $cents = (int) ($this->total_amount_cents ?? 0);
        return '$' . number_format($cents / 100, 2);
    }

    public function getMaskedCardAttribute(): ?string
    {
        if (!$this->payment_method_brand || !$this->payment_method_last4) {
            return null;
        }
        return strtoupper($this->payment_method_brand) . ' •••• ' . $this->payment_method_last4;
    }

    /* ---------------- Scopes ---------------- */

    public function scopePaid($query)
    {
        return $query->where('payment_status', self::STATUS_SUCCEEDED);
    }

    public function scopePending($query)
    {
        return $query->where('payment_status', self::STATUS_PENDING);
    }

    public function scopeAdminNew($query)
    {
        return $query->where('admin_status', self::ADMIN_NEW);
    }

    public function scopeAdminApproved($query)
    {
        return $query->where('admin_status', self::ADMIN_APPROVED);
    }

    /* ---------------- Helpers ---------------- */

    public function isPaid(): bool
    {
        return $this->payment_status === self::STATUS_SUCCEEDED;
    }

    public function isApproved(): bool
    {
        return $this->admin_status === self::ADMIN_APPROVED;
    }
}
