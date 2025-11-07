<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'start_date',
        'end_date',
        'rent_value',
        'payment_day',
        'property_id',
        'tenant_id'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class)->withTrashed();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
