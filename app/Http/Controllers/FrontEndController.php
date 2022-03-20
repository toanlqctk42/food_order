<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Dish;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $dishes = Dish::where('dish_status',1)->get();

        return view('FrontEnd.include.home',compact('dishes'));
    }

    public function dish_show($id)
    {
        $categoryDish = Dish::where('category_id',$id)->where('dish_status',1)->get();
        return view('FrontEnd.include.dish',compact('categoryDish'));
    }
}
