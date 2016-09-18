<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class LabelTemplate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'path'
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

    public function companies()
    {
        return $this->belongsToMany('App\Models\Company')->withTimestamps();
    }

    /**
     * Get company logo
     *
     */
    public function getTemplateImage()
    {
        $storage_path = public_path('/images/labelTemplates/'.$this->id.'/');

        if(!empty($this->path) && File::exists($storage_path.$this->path))
        {
            // Get the filename from the full path
            $filePath = '/images/labelTemplates/'.$this->id.'/'.$this->path;

            return $filePath;
        }

        return '/images/profile-placeholder.png';
    }
}
