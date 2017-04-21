<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'house', 'address1', 'address2', 'area', 'county', 'postcode',
    ];

    /**
     * Get the user for the address.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
