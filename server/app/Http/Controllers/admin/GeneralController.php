<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function contactsList(){
        $contactsArr = DB::table('contact_me')
                            ->select('*')
                            ->orderBy('id', 'DESC')
                            ->get();

        return view('admin/general/contactslist')->with('contactsArr', $contactsArr);
    }
}
