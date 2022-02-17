<?php

namespace App\Http\Controllers;

use App\Models\Drag;
use Illuminate\Http\Request;
use App\Models\Substance;

class SubstanceController extends Controller
{
    public function index()
    {
        return Substance::all();
    }
}
