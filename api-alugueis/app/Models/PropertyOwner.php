<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyOwner extends Model
{
    protected $fillable = [
        'agency_profile_id',
        'name',
        'phone',
        'cpf',
    ];

    public function agencyProfile()
    {
        return $this->belongsTo(AgencyProfile::class);
    }

    public function property()
    {
        return $this->hasMany(Property::class);
    }
}
