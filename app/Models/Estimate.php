<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estimate extends Model
{
    use HasFactory;

    protected $table ='estimates';

    protected $fillable = [
        'proposal_id',
        'estimated_amount',
        'estimate_notes',
    ];

    public function proposal():BelongsTo
    {
        return $this->belongsTo(Proposal::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

}
