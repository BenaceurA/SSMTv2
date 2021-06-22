<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class settingsController extends Controller
{
    function settingsIndex()
    {
        return view("/admin/paramètres/settingsIndex", ["view" => "settings"]);
    }
}
