<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\File;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    public function companies()
    {
        return $this->belongsToMany('App\Models\Company')->withTimestamps();
    }

    /**
     * Does the user have a particular role?
     *
     * @param $name
     * @return bool
     */
    public function hasRole($name)
    {
        foreach ($this->roles as $role)
        {
            if ($role->name == $name) return true;
        }
        return false;
    }

    public function getRole(){
        $name = '';

        if(count($this->roles()) > 0){
            foreach($this->roles as $role){
                $name = $role->name;
            }
        }

        return $name;
    }

    public function getCompanyName(){
        $name = '';

        if(count($this->companies()) > 0){
            foreach($this->companies as $company){
                $name = $company->name;
            }
        }

        return $name;
    }


    /**
     * Assign a role to the user
     *
     * @param $role
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }
    /**
     * Remove a role from a user
     *
     * @param $role
     * @return mixed
     */
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    /**
     * Assign a company to the user
     *
     * @param $company
     * @return mixed
     */
    public function assignCompany($company)
    {
        return $this->companies()->attach($company);
    }

    /**
     * Get user avatar
     *
     */
    public function getAvatarImage()
    {
        $storage_path = public_path('/images/users/avatars/'.$this->id.'/');

        if(!empty($this->avatar) && File::exists($storage_path.$this->avatar))
        {
            // Get the filename from the full path
            $filePath = '/images/users/avatars/'.$this->id.'/'.$this->avatar;

            return $filePath;
        }

        return '/images/profile-placeholder.png';
    }
}
