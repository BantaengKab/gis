<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peluang;
use App\Models\Wilayah;

class PetaController extends Controller
{
     public function marker()
    {
        $markers = Peluang::with('sektor')->get(); 

        return response()->json($markers);
    }

    public function getKecamatan()
    {
        $kecamatans = Wilayah::where('klasifikasi', 'KEC')->get();
        return response()->json($kecamatans);
    }

    public function getKelurahan($parentId)
    {
        $kelurahan = Wilayah::where('kd_induk', $parentId)->get();
        return response()->json($kelurahan);
    }
}
