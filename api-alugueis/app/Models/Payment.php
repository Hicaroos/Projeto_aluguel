<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'amount',
        'paid_date',
        'due_date',
        'status',
        'contract_id'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
