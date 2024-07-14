<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinController extends Controller
{
    public function index(){
        return view("master");
    }

    public function find($id){
        return view("chitiet");
    }
}
