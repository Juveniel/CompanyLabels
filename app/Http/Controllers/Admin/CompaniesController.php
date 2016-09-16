<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libraries\ImageResize;
use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the companies.
     *
     * @return View
     */
    function index() {
        $companies = Company::all();

        return view('backend.companies.list', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new company.
     *
     * @return View
     */
    public function create()
    {
        return view('backend.companies.create', []);
    }

    /**
     * Store a newly created company in database.
     *
     * @param  Request  $request
     * @return Redirect
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:companies',
            'email' => 'required|email|unique:companies',
            'address' => 'required',
        ]);

        //validation passed -> insert user data
        $company = new Company;

        $company->name        = e($request->name);
        $company->email       = e($request->email);
        $company->address     = e($request->address);
        $company->bulstat     = e($request->bulstat);
        $company->mol         = e($request->mol);
        $company->description = e($request->description);
        $company->facebook      = e($request->facebook);
        $company->linked_in     = e($request->linkedin);
        $company->google_plus   = e($request->googleplus);
        $company->save();

        //add user logo
        if ($request->hasFile('logo'))
        {
            $new_company = Company::find($company->id);

            //Get the image to be uploaded, rename it so as to be unique, save and then alter as required.
            $file = $request->file('logo');
            $image_name = time() . '-' . $file->getClientOriginalName();

            //Store original image so we can create thumb
            Storage::disk('companies')->put(
                $image_name,
                file_get_contents($request->file('logo')->getRealPath())
            );

            //Create thumbnail
            $thumbnail_name = '200x150-'.$file->getClientOriginalName();
            $thumbnail = new ImageResize(public_path('images/users/avatars/'.$image_name));
            $thumbnail->resizeImage(200, 150, 'exact');
            $thumbnail->saveImage(public_path('images/users/avatars/'.$new_company->id."/".$thumbnail_name, 100));

            //Remove original file form storage
            Storage::disk('companies')->delete($image_name);

            //Save path to users table
            $company->logo = $thumbnail_name;
            $company->save();
        }

        return redirect()->intended('/admin/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        Log::info('Showing company profile with id: '.$id);

        $companyData = array();

        try{
            $Company = Company::find($id);

            $companyData = [
                'id' => (int)$Company->id,
                'name' => $Company->name,
                'email' => $Company->email,
                'address' => $Company->address,
                'bulstat' => $Company->bulstat,
                'mol' => $Company->mol,
                'description' => $Company->description,
                'logoPath' => $Company->logo,
                'facebook' => $Company->facebook,
                'linkedIn' => $Company->linked_in,
                'googlePlus' => $Company->google_plus
            ];

        }catch (\Exception $e){
            $companyData = [
                "error" => "Profile doesn't exist"
            ];

        }finally{
            return view('backend.companies.show')->with('companyData', $companyData);
        }
    }

}
