<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeluangRequest;
use Illuminate\Http\Request;
use App\Models\Peluang;
use App\Models\Sektor;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

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
        $user = Auth::user();
        $peluangs = (new Peluang)->newQuery();
         if ($user->id == 1 || $user->id == 2) {

            $sektor = Sektor::all()->pluck("id");

        } else {

            $sektorCol = collect();
            foreach ($user->user_has_sektor as $uhs) {
                $sektorCol = $sektorCol->concat($uhs->sektor);
            }
            $sektor = $sektorCol->pluck("id");

        }
        
        $peluangs->whereIn('sektor_id', $sektor);
        if (request()->has('search')) {
            $peluangs->where('nama', 'Like', '%' . request()->input('search') . '%');
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
        $user = Auth::user();
        
        if ($user->id == 1 || $user->id == 2) {

            $sektor = Sektor::all()->pluck("nama", "id");

        } else {

            $sektorCol = collect();
            foreach ($user->user_has_sektor as $uhs) {
                $sektorCol = $sektorCol->concat($uhs->sektor);
            }
            $sektor = $sektorCol->pluck("nama", "id");

        }
        
        
        $wilayah = Wilayah::all()->pluck("nama", "kd_wilayah");
        return Inertia::render('Admin/Peluang/Create', [
            'sektor' => $sektor,
            'wilayah' => $wilayah,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeluangRequest $request)
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
        $sektor = Sektor::where("id", $peluang->sektor_id)->first();
        $wilayah = Wilayah::where("kd_wilayah", $peluang->wilayah_id)->first();
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
        $user = Auth::user();
        
        if ($user->id == 1 || $user->id == 2) {

            $sektor_id = Sektor::all()->pluck("id");
            $sektor = Sektor::all()->pluck("id","name");

        } else {

            $sektorColId = collect();
            $sektorCol = collect();
            foreach ($user->user_has_sektor as $uhs) {
                $sektorColId = $sektorColId->concat($uhs->sektor);
                $sektorCol = $sektorCol->concat($uhs->sektor);
            }
            $sektor_id = $sektorColId->pluck("id");
            $sektor = $sektorCol->pluck("id","name");

        }
        $cek = Peluang::where('id',$peluang->id)->whereIn('sektor_id', $sektor_id)->get();
        if ($cek->count() < 1) {
            return redirect()->route('peluang.index')
            ->with('message', __('Maaf.'));
        }
        $wilayah = Wilayah::all()->pluck("nama", "kd_wilayah");
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