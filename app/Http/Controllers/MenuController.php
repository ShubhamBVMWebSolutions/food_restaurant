<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
class MenuController extends Controller
{
    public function menu() {
        $lunch= Food::where('category','1')->get();
        $breakfast= Food::where('category','2')->get();
        $starters = Food::where('category','3')->get();
        $dinner= Food::where('category','4')->get();
        return view('food_home.main_content.menu',compact('lunch','breakfast','starters','dinner'));
    }
}
