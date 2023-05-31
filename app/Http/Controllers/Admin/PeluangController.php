<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peluang;
use App\Models\Sektor;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PeluangController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:peluang list', ['only' => ['index', 'show']]);
        $this->middleware('can:peluang create', ['only' => ['create', 'store']]);
        $this->middleware('can:peluang edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:peluang delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $peluangs = (new Peluang)->newQuery();

        if (request()->has('search')) {
            $peluangs->where('nama', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $peluangs->orderBy($attribute, $sort_order);
        } else {
            $peluangs->latest();
        }

        $peluangs = $peluangs->paginate(5)->onEachSide(2)->appends(request()->query());
        
        return Inertia::render('Admin/Peluang/Index', [
            'peluangs' => $peluangs,
            'filters' => request()->all('search'),
            'can' => [
                'create' => Auth::user()->can('peluang create'),
                'edit' => Auth::user()->can('peluang edit'),
                'delete' => Auth::user()->can('peluang delete'),
            ]
        ]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sektor = Sektor::all()->pluck("nama","id");
        $wilayah = Wilayah::all()->pluck("nama","kd_wilayah");
        return Inertia::render('Admin/Peluang/Create', [
            'sektor' => $sektor,
            'wilayah' => $wilayah,
        ]);
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Peluang::create($request->all());

        return redirect()->route('peluang.index')
                        ->with('message', __('Peluang created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Peluang $peluang)
    {
         $sektor = Sektor::where("id",$peluang->sektor_id)->first();
        $wilayah = Wilayah::where("kd_wilayah",$peluang->wilayah_id)->first();
         return Inertia::render('Admin/Peluang/Show', [
            'peluang' => $peluang,
            'sektor' => $sektor,
            'wilayah' => $wilayah,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peluang $peluang)
    {
        $sektor = Sektor::all()->pluck("nama","id");
        $wilayah = Wilayah::all()->pluck("nama","kd_wilayah");
        return Inertia::render('Admin/Peluang/Edit', [
            'peluang' => $peluang,
            'sektor' => $sektor,
            'wilayah' => $wilayah,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peluang $peluang)
    {
        $peluang->update($request->all());

        return redirect()->route('peluang.index')
                        ->with('message', __('Peluang updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peluang $peluang)
    {
        $peluang->delete();

        return redirect()->route('peluang.index')
                        ->with('message', __('Peluang deleted successfully'));
    }
}