<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    public function index()
    {
        $path = storage_path("app/profile.json");
        $json = File::get($path);
        $data = json_decode($json, true);

        return view("profile", $data);
    }

    public function getData()
    {
        $path = storage_path("app/profile.json");
        $json = File::get($path);
        $data = json_decode($json, true);

        return response ()->json($data);
    }
}
