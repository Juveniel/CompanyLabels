<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\Response;

use App\Libraries\ImageResize;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return view('backend.users.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //get roles select
        $roles = Role::orderBy('name', 'ASC')->lists('name', 'id');
        $roles->prepend("--- Choose a user group ---", -1);

        //get countries select
        $countries = Country::orderBy('name', 'ASC')->lists('name', 'id');
        $countries->prepend("--- Choose a country ---", -1);

        return view('backend.users.create', ['countries' => $countries, 'roles' => $roles]);
    }

    /**
     * Get cities list for chained select
     *
     * @param  Request  $request
     * @return Response
     */
    public function get_cities($id)
    {
        $country = null;
        $key = '';

        if(is_numeric($id)){
            $country = Country::findOrFail($id);
            $key = 'id';
        }
        else{
            $country =  Country::where('name', 'LIKE', $id)->firstOrFail();
            $key = 'name';
        }

        $cities = City::orderBy('name', 'ASC')->where('country_code', 'like', $country->code)->lists('name', $key);

        return $cities;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,jpg,bmp,png,gif',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'user_role' => 'required|not_in:-1'
        ]);

        $country = '';
        if($request->exists('country') && $request->country > 0){
            $country = Country::find(e($request->country))->name;
        }

        $city = '';
        if($request->exists('city') && $request->city > 0){
            $city = City::find(e($request->city))->name;
        }

        //validation passed -> insert user data
        $user = new User;

        $user->email         = e($request->email);
        $user->password      = Hash::make(e($request->password));
        $user->first_name    = e($request->first_name);
        $user->last_name     = e($request->last_name);
        $user->country       = e($country);
        $user->city          = e($city);
        $user->facebook      = e($request->facebook);
        $user->linked_in     = e($request->linkedin);
        $user->google_plus   = e($request->googleplus);

        $user->save();

        //attack role to the new user
        $new_user = User::find($user->id);
        $new_user->assignRole(e($request->user_role));

        //add user avatar
        if ($request->hasFile('avatar'))
        {
            //Get the image to be uploaded, rename it so as to be unique, save and then alter as required.
            $file = $request->file('avatar');
            $image_name = time() . '-' . $file->getClientOriginalName();

            //Store original image so we can create thumb
            Storage::disk('avatars')->put(
                $image_name,
                file_get_contents($request->file('avatar')->getRealPath())
            );

            //Create thumbnail
            $thumbnail_name = '200x150-'.$file->getClientOriginalName();
            $thumbnail = new ImageResize(public_path('images/users/avatars/'.$image_name));
            $thumbnail->resizeImage(200, 150, 'exact');
            $thumbnail->saveImage(public_path('images/users/avatars/'.$new_user->id."/".$thumbnail_name, 100));

            //Remove original file form storage
            Storage::disk('avatars')->delete($image_name);

            //Save path to users table
            $user->avatar = $thumbnail_name;
            $user->save();
        }

        return redirect()->intended('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        Log::info('Showing user profile for user: '.$id);

        $userData = array();

        try{
            $User = User::find($id);

            $userData = [
                'id' => (int)$User->id,
                'email' => $User->email,
                'first_name' => $User->first_name,
                'last_name' => $User->last_name,
                'full_name' => $User->first_name.' '.$User->last_name,
                'country' => $User->country,
                'city' => $User->city,
                'avatar' => $User->getAvatarImage(),
                'facebook' => $User->facebook,
                'linkedIn' => $User->linked_in,
                'googlePlus' => $User->google_plus
            ];

        }catch (\Exception $e){
            $userData = [
                "error" => "Profile doesn't exist"
            ];

        }finally{
            return view('backend.users.show')->with('userData', $userData);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $user_country_cities = array();

        //get roles select
        $roles = Role::orderBy('name', 'ASC')->lists('name', 'name');
        $roles->prepend("--- Choose a user group ---", -1);

        //get countries select
        $countries = Country::orderBy('name', 'ASC')->lists('name', 'name');
        $countries->prepend("--- Choose a country ---", -1);

        //cities for selected country
        if(!empty($user->country)){
            $user_country = Country::where('name', 'LIKE', $user->country)->firstOrFail();

            if($user_country != null){
                $user_country_cities = $user_country->cities()->lists('name', 'name');
            }
        }

        return view('backend.users.edit', ['user' => $user, 'roles' => $roles, 'countries' => $countries, 'cities' => $user_country_cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if($request->exists('user_role')){
            $role_rq = Role::where('name', 'like' , $request->user_role)->first();

            if($role_rq != null){
                $roleId = $role_rq->id;
            }
        }

        if($user != null){

            $this->validate($request, [
                'avatar' => 'image|mimes:jpeg,jpg,bmp,png,gif',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'user_role' => 'required|not_in:-1'
            ]);

            if($request->hasFile('avatar')){
                //Check for existing avatar and remove it
                if ($user->avatar != null)
                {
                    Storage::disk('avatars')->deleteDirectory($user->id);

                    $user->avatar = "";
                    $user->save();
                }

                //Get the image to be uploaded, rename it so as to be unique, save and then alter as required.
                $file = $request->file('avatar');
                $image_name = time() . '-' . $file->getClientOriginalName();

                //Store original image so we can create thumb
                Storage::disk('avatars')->put(
                    $image_name,
                    file_get_contents($request->file('avatar')->getRealPath())
                );

                //Create thumbnail
                $thumbnail_name = '200x150-'.$file->getClientOriginalName();
                $thumbnail = new ImageResize(public_path('images/users/avatars/'.$image_name));
                $thumbnail->resizeImage(200, 150, 'exact');
                $thumbnail->saveImage(public_path('images/users/avatars/'.$user->id."/".$thumbnail_name));

                //Remove original file form storage
                Storage::disk('avatars')->delete($image_name);

                //Save path to users table
                $user->avatar = $thumbnail_name;
            }

            $user->email = e($request->email);
            $user->first_name = e($request->first_name);
            $user->last_name = e($request->last_name);
            $user->country = e($request->country);
            $user->city = e($request->city);
            $user->facebook = e($request->facebook);
            $user->linked_in = e($request->linked_in);
            $user->google_plus = e($request->google_plus);

            $user->roles()->sync([$roleId]);
            $user->save();

            Session::flash('record_updated', 'You have successfully updated the user record!');
            return redirect('/admin/users/edit/'.$user->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        //delete user avatar folder
        Storage::disk('avatars')->deleteDirectory($user->id);

        //soft delete user
        $user->delete();

        //warn user
        Session::flash('user_deleted', 'User successfully deleted!');

        return redirect('/admin/users/');
    }

    public function lock_screen(){
        Auth::logout();

        return redirect(\URL::previous());
    }


}
