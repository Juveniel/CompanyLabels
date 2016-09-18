<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'bulstat', 'mol', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * Get company logo
     *
     */
    public function getLogoImage()
    {
        $storage_path = public_path('/images/companies/logo/'.$this->id.'/');

        if(!empty($this->logo) && File::exists($storage_path.$this->logo))
        {
            // Get the filename from the full path
            $filePath = '/images/companies/logo/'.$this->id.'/'.$this->logo;

            return $filePath;
        }

        return '/images/profile-placeholder.png';
    }
}
