<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function __invoke()
    {
        // $pannels = [];
        // $configPannels = config('admin.pannels');

        // foreach ($configPannels as $pannel) {
        //     array_push($pannels, new PannelAdmin($pannel));
        // }

        return view('back.index');
    }
}
