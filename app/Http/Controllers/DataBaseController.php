<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataBaseController extends Controller
{
    public function downloadData(){
        return DB::unprepared("select * from mst_vehiculos");
    }
}
