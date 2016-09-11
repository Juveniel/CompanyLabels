<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = ['name'];

    public $timestamps = true;
}
