<?php

namespace App\Http\Controllers;

use App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StartController extends BaseController
{
    public function start(){

        return view("index");
    }
}
