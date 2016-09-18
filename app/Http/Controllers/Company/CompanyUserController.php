<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompanyUserController extends Controller
{
    public function index(){
        if (Auth::check() && Auth::user()->getRole() === 'company') {
            return redirect('company/dashboard');
        }

        return redirect('/');
    }

    public function dashboard()
    {
        $loggedUserId = Auth::user()->id;
        $loggedUserName = Auth::user()->username;
        $loggedUserType = Auth::user()->getRole();

        if (Auth::check() && $loggedUserType === 'company') {
            $arrData = array(
                'id' => $loggedUserId,
                'username' => $loggedUserName,
                'usertype' => $loggedUserType
            );

            return view('front.company.dashboard')->with('data', $arrData);
        }

        return redirect('/');
    }
}
