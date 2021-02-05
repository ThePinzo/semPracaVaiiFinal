<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index()
    {
        $tip = Tip::all()->toArray();
        return view('tip.index', compact('tip'));
    }
}
