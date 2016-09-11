<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'continent'];

    public function cities()
    {
        return $this->hasMany('App\Models\City', 'country_code', 'code');
    }


}
