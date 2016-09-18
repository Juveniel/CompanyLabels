<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    public function index(){
        if (Auth::check() && Auth::user()->getRole() === 'admin') {
            return redirect('admin/dashboard');
        }
        else{
            return redirect('/');
        }
    }

    public function dashboard(){
        $loggedUserId = Auth::user()->id;
        $loggedUserName = Auth::user()->username;

        $arrData = array(
            'id' => $loggedUserId,
            'username' => $loggedUserName
        );

        return view('backend.dashboard')->with('data', $arrData);
    }

    private function set_active($uri)
    {
        return Request::is($uri) ? 'active' : '';
    }


}
