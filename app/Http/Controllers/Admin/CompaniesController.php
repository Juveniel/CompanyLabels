<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libraries\ImageResize;
use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

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
            'logo' => 'required|image|mimes:jpeg,jpg,bmp,png,gif',
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
            $image_name = 'original-'. time() . '-' . $file->getClientOriginalName();
            $image_path = '/'. $new_company->id . '/' . $image_name;

            //Store original image so we can create thumb
            Storage::disk('companies')->put(
                $image_path,
                file_get_contents($request->file('logo')->getRealPath())
            );

            //Create thumbnail
            $thumbnail_name = '200x150-'.$file->getClientOriginalName();
            $thumbnail = new ImageResize(public_path('images/companies/logo/'.$image_path));
            $thumbnail->resizeImage(200, 150, 'exact');
            $thumbnail->saveImage(public_path('images/companies/logo/'.$new_company->id."/".$thumbnail_name), 100);

            //Save path to users table
            $company->logo = $image_name;
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
                'logo' => $Company->getLogoImage(),
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

    /**
     * Show the form for editing the company.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('backend.companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified company in db.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return redirect
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        if($company != null){

            $this->validate($request, [
                'logo' => 'image|mimes:jpeg,jpg,bmp,png,gif',
                'email' => 'required|email|unique:companies,email,'.$company->id,
                'name' => 'required|min:3|unique:companies,name,'.$company->id,
                'address' => 'required'
            ]);

            if($request->hasFile('logo')){
                //Check for existing avatar and remove it
                if ($company->logo != null)
                {
                    Storage::disk('companies')->deleteDirectory($company->id);

                    $company->logo = "";
                    $company->save();
                }

                //Get the image to be uploaded, rename it so as to be unique, save and then alter as required.
                $file = $request->file('logo');
                $image_name = 'original-'. time() . '-' . $file->getClientOriginalName();
                $image_path = '/'. $company->id . '/' . $image_name;

                //Store original image so we can create thumb
                Storage::disk('companies')->put(
                    $image_path,
                    file_get_contents($request->file('logo')->getRealPath())
                );

                //Create thumbnail
                $thumbnail_name = '200x150-'.$file->getClientOriginalName();
                $thumbnail = new ImageResize(public_path('images/companies/logo/'.$image_path));
                $thumbnail->resizeImage(200, 150, 'exact');
                $thumbnail->saveImage(public_path('images/companies/logo/'.$company->id."/".$thumbnail_name), 100);

                //Save path to users table
                $company->logo = $image_name;
            }

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

            Session::flash('record_updated', 'You have successfully updated the company record!');
            return redirect('/admin/companies/edit/'.$company->id);
        }
    }

}
