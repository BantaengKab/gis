<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\KontenRequest;
use App\Models\KontenInvest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class KontenController extends Controller
{
    
      public function __construct()
    {
        $this->middleware('can:konten list', ['only' => ['index', 'show']]);
        $this->middleware('can:konten create', ['only' => ['create', 'store']]);
        $this->middleware('can:konten edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:konten delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontens = (new KontenInvest)->newQuery();

        if (request()->has('search')) {
            $kontens->where('nama', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $kontens->orderBy($attribute, $sort_order);
        } else {
            $kontens->latest();
        }

        $kontens = $kontens->paginate(5)->onEachSide(2)->appends(request()->query());

        return Inertia::render('Admin/Konten/Index', [
            'kontens' => $kontens,
            'filters' => request()->all('search'),
            'can' => [
                'create' => Auth::user()->can('konten create'),
                'edit' => Auth::user()->can('konten edit'),
                'delete' => Auth::user()->can('konten delete'),
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Konten/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KontenRequest $request)
    {   
        $data = $request->all();
         if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = $image->getClientOriginalName();
            $image->move('konten/', $imageName);
            $data['img'] = $imageName;
        } 
        
        KontenInvest::create($data);

        return redirect()->route('konten.index')
                        ->with('message', __('konten created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(KontenInvest $konten)
    {
         return Inertia::render('Admin/Konten/Show', [
            'konten' => $konten,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KontenInvest $konten)
    {
        return Inertia::render('Admin/Konten/Edit', [
            'konten' => $konten,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KontenInvest $konten)
    {
         $data = $request->all();
         if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = $image->getClientOriginalName();
            $image->move('konten/', $imageName);
            $data['img'] = $imageName;
        } 

        $konten->update($data);

        return redirect()->route('konten.index')
                        ->with('message', __('Konten updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KontenInvest $konten)
    {
        $konten->delete();

        return redirect()->route('konten.index')
                        ->with('message', __('Konten deleted successfully'));
    }
}
