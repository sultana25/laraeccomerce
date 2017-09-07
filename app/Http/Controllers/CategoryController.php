<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory()
    {
        
            return view('admin.category.createCategory');
    }
}
