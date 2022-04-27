<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
    //
    public function download($path,$path2){
        $file = public_path().'/uploads/'.$path.'/'.$path2;

        return response()->download($file);
    }
    }

