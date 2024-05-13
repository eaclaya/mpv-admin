<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view("clients.index");
    }

    public function create()
    {
        $client = Client::make();
        return view("clients.edit", ["client" => $client]);
    }

    public function edit(Client $client)
    {
        return view("clients.edit", ["client" => $client]);
    }
}
