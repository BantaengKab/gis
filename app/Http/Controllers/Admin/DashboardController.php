<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investasi;
use App\Models\Peluang;
use App\Models\Investor;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->post('https://splp.layanan.go.id/oauth2/token', [
            'client_id' => 'zxoPNxYWkLVuWRzynxkW799BnGoa',
            'client_secret' => 'fh6OdJ7O_atJ6fz5S0LsO_6xLR4a',
            'grant_type' => 'client_credentials',
        ]);
        if ($response->successful()) {
            // Request was successful, handle the response
           return $response->json();
            // Process the response data
        } else {
            // Request failed, handle the error
            $errorCode = $response->status();
            $errorMessage = $response->body();
            // Handle the error accordingly
        }



        $investor = Investor::count();
        $peluang = Peluang::count();
        $rencana = Investasi::sum('rencana');
        $realisasi = Investasi::sum('realisasi');
        return Inertia::render('Dashboard', [
            'peluang' => $peluang,
            'investor' => $investor,
            'rencana' => $rencana,
            'realisasi' => $realisasi,
        ]);



    }
}
