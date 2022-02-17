<?php

namespace App\Http\Controllers;

use App\Models\Substance;
use Illuminate\Http\Request;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    public function index()
    {
        return Manufacturer::all();
    }
}
