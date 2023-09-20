<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function getAvailableUpdate(){
        return "1.3.2";
    }
}