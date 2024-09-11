<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function clientCheck()
    {
        $domain = request()->domain;
        $id = request()->id;

        $client = null;
        if ($domain) {
            $client = Client::where("domain", $domain)->first();
        }
        if ($id) {
            $client = Client::find($id);
        }
        if (!$client) {
            return response()->json(["error" => "Client not found"], 404);
        }
        if (
            $client->due_date &&
            $client->due_date->addDays(15)->diffInDays(now()) >= 0
        ) {
            return response()->json(["expired" => true]);
        }

        return response()->json(["expired" => false]);
    }
}
