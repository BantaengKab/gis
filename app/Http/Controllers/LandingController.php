<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peluang;
use App\Models\Wilayah;
use App\Models\Investasi;
use App\Models\Sektor;
use App\Models\KontenInvest;
use App\Models\Investor;
use Inertia\Inertia;

class LandingController extends Controller
{
     public function marker()
    {
        $markers = Peluang::with('sektor','wilayah')->get(); 

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


    public function beranda()
    {
         $investasis = Investasi::query()
        ->with('investor')
        ->paginate(5)
        ->onEachSide(2)
        ->appends(request()->query());
        
        return Inertia::render('Landing/Beranda', [
            'investasis' => $investasis
        ]);
    }

    public function invest()
    {
         $kontens = KontenInvest::orderBy('no_urut', 'asc')->get();
        
        return Inertia::render('Landing/Invest', [
            'kontens' => $kontens
        ]);
    }


}
