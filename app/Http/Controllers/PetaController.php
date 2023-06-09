<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peluang;

class PetaController extends Controller
{
     public function marker()
    {
        $markers = Peluang::with('sektor')->get(); 

        return response()->json($markers);
    }
}
