<?php

namespace App\Http\Controllers\Admin;

use App\Models\LabelTemplate;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LabelTemplatesController extends Controller
{
    /**
     * Display a listing of the companies.
     *
     * @return View
     */
    function index() {
        $templates = LabelTemplate::all();

        return view('backend.labels.list', ['templates' => $templates]);
    }

    /**
     * Show the form for creating a new company.
     *
     * @return View
     */
    public function create()
    {
        return view('backend.labels.create', []);
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
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        //validation passed -> insert user data
        $template = new LabelTemplate();

        $template->title       = e($request->title);
        $template->description = e($request->description);
        $template->save();

        //add user logo
        if ($request->hasFile('image'))
        {
            $new_template = LabelTemplate::find($template->id);

            //Get the image to be uploaded, rename it so as to be unique, save and then alter as required.
            $file = $request->file('image');
            $image_name = 'original-'. time() . '-' . $file->getClientOriginalName();
            $image_path = '/'. $new_template->id . '/' . $image_name;

            //Store original image so we can create thumb
            Storage::disk('labelTemplates')->put(
                $image_path,
                file_get_contents($request->file('image')->getRealPath())
            );

            //Save path to users table
            $template->path = $image_name;
            $template->save();
        }

        return redirect()->intended('/admin/labels');
    }

}
