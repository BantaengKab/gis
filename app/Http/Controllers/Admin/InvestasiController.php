<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investasi;
use App\Models\Sektor;
use App\Models\Investor;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class InvestasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:investasi list', ['only' => ['index', 'show']]);
        $this->middleware('can:investasi create', ['only' => ['create', 'store']]);
        $this->middleware('can:investasi edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:investasi delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $investasis = (new Investasi)->newQuery();
        $investasis->with('investor');
        if (request()->has('search')) {
            $investasis->whereRelation('investor','nama', 'Like', '%'.request()->input('search').'%');
        } else {
            $investasis->with('investor');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $investasis->orderBy($attribute, $sort_order);
        } else {
            $investasis->latest();
        }

        $investasis = $investasis->paginate(5)->onEachSide(2)->appends(request()->query());
        return Inertia::render('Admin/Investasi/Index', [
            'investasis' => $investasis,
            'filters' => request()->all('search'),
            'can' => [
                'create' => Auth::user()->can('investasi create'),
                'edit' => Auth::user()->can('investasi edit'),
                'delete' => Auth::user()->can('investasi delete'),
            ]
        ]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sektor = Sektor::all()->pluck("nama","id");
        $investor = Investor::all()->pluck("nama","id");
        return Inertia::render('Admin/Investasi/Create', [
            'sektor' => $sektor,
            'investor' => $investor,
        ]);
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Investasi::create($request->all());

        return redirect()->route('investasi.index')
                        ->with('message', __('Investasi created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Investasi $investasi)
    {
         $sektor = Sektor::where("id",$investasi->sektor_id)->first();
        $investor = Investor::where("id",$investasi->investor_id)->first();
         return Inertia::render('Admin/Investasi/Show', [
            'investasi' => $investasi,
            'sektor' => $sektor,
            'investor' => $investor,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investasi $investasi)
    {
        $sektor = Sektor::all()->pluck("nama","id");
        $investor = Investor::all()->pluck("nama","id");
        return Inertia::render('Admin/Investasi/Edit', [
            'investasi' => $investasi,
            'sektor' => $sektor,
            'investor' => $investor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investasi $investasi)
    {
        $investasi->update($request->all());

        return redirect()->route('investasi.index')
                        ->with('message', __('Investasi updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investasi $investasi)
    {
        $investasi->delete();

        return redirect()->route('investasi.index')
                        ->with('message', __('Investasi deleted successfully'));
    }
}