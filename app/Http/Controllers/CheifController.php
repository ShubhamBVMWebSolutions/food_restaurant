<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cheif;

class CheifController extends Controller
{
    public function Chief() {
        return view('food_home.main_content.cheif');
    }
}
