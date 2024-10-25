<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function  client()
    {
        $models = Client::all();
        return view('/client.index', ['models' => $models]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(ClientStoreRequest $request)
    {
        $data = $request->all();

        Client::create($data);
        return redirect('/client');
    }

    
    public function delete($id)
    {
        $model = Client::find($id);
        $model->delete();
        return redirect('/client')->with('success', 'Category successfully deleted');
    }
}
