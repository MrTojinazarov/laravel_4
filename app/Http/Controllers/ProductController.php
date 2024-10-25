<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function  product()
    {
        $models = Product::all();
        return view('/product.index', ['models' => $models]);
    }

    public function create()
    {
        $models = Company::all();
        return view('product.create', ['models' => $models]);
    }

    public function store(ProductStoreRequest $request)
    {

        $data = $request->all();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y-m-d') . '_' . time() . '.' . $extension;
            $file->move('img_uploded/', $filename);
            $data['img'] = 'img_uploded/' . $filename;
        }

        $post = Product::create($data);
        return redirect('/product')->with('success', 'Post successfully added');
    }

    public function delete(Product $id)
    {
        $id->delete();
        return redirect('/product')->with('success', 'Post successfully deleted');
    }
}
