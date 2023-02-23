<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function edit(Request $request, $id)
    {
        return $request->all();
    }
}
