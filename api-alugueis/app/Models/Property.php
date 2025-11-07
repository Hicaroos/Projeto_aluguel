<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'address_street',
        'address_number',
        'address_city',
        'bedrooms',
        'bathrooms',
        'garage_spaces',
        'status',
        'user_id',
        'property_owner_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function propertyImages()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function propertyOwner(){
        return $this->belongsTo(PropertyOwner::class);
    }
}
