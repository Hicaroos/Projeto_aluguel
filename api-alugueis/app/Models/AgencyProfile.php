<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgencyProfile extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'cnpj',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function propertyOwner()
    {
        return $this->hasMany(PropertyOwner::class);
    }
}
