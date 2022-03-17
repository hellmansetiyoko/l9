<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('biodata.index');
    }

    public function editUser(Biodata $biodata)
    {
        // return $biodata->user->id;
       return redirect()->to(route('admin.edit-user',
                [
                    'user'=>$biodata->user->id,
                ]));
    }
}
