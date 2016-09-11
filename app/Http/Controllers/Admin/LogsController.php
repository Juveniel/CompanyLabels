<?php

namespace App\Http\Controllers\Admin;

use App\Libraries\LaravelLogViewer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;



class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (request()->input('l')) {
            LaravelLogViewer::setFile(base64_decode(request()->input('l')));
        }
        if (request()->input('dl')) {
            return Response::download(storage_path() . '/logs/' . base64_decode(request()->input('dl')));
        }
        elseif (request()->has('del')) {
            File::delete(storage_path() . '/logs/' . base64_decode(request()->input('del')));
            return redirect('/admin/logs/access');
        }
        $logs = LaravelLogViewer::all();


        return view('backend.logs.access-log', ['logs' => $logs, 'files' => LaravelLogViewer::getFiles(true),'current_file' => LaravelLogViewer::getFileName() ]);
    }
}
