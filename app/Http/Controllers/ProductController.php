<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function  product()
    {
        $models = Product::all();
        return view('/product.index', ['models' => $models]);
    }
}