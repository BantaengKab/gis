<?php

namespace App\Http\Controllers;

use App\Helpers\TokenHelper;
use Illuminate\Http\Request;
use App\Models\Peluang;
use App\Models\Wilayah;
use App\Models\Investasi;
use App\Models\Sektor;
use App\Models\KontenInvest;
use App\Models\Investor;
use Inertia\Inertia;
use App\Models\FormInvestasi;


class LandingController extends Controller
{
    public function marker()
    {
        $markers = Peluang::with('sektor', 'wilayah')->get();

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


    public function testing()
    {


        return TokenHelper::getToken();
    }

    public function submit(Request $request)
    {
        // Validate the incoming form data
        $validatedData = $request->validate([
            'tgl_pertemuan' => 'required|date',
            'lokasi' => 'required|string',
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'no_telp' => 'required|string',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'desk_usaha' => 'required|string',
            'perusahaan' => 'required|string',
            'bidang_usaha' => 'required|string',
            'pref_lokasi' => 'required|string',
            'negara' => 'required|string',
            'stat_inves' => 'required|string',
            'nilai_invest' => 'required|numeric',
            'mata_uang' => 'required|string',
            'tki_tot' => 'required|integer',
            'tki_rencana' => 'required|integer',
            'tki_eksis' => 'required|integer',
            'tka_tot' => 'required|integer',
            'tka_rencana' => 'required|integer',
            'tka_eksis' => 'required|integer',
            'induk_perusahaan' => 'nullable|string',
            'informasi' => 'required|string',
            'desk_proy' => 'required|string',
            'kendala' => 'required|string',
            'tindak_lanjut' => 'required|string',
        ]);

        $validatedData = $request->all();

        // Store the validated form data in the database
        $formSubmission = FormInvestasi::create($validatedData);

        // Optionally, you can perform additional operations or return a response

        return response()->json(['message' => 'Form submitted successfully']);
    }


}