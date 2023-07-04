<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investasi;
use App\Models\Peluang;
use App\Models\Investor;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $investor = Investor::count();
        $peluang = Peluang::count();
        $Investasi = Peluang::sum('rencana');
        return Inertia::render('Dashboard', [
            'peluang' => $peluang,
            'investor' => $investor,
            'investasi' => $Investasi,
        ]);
    }
}
