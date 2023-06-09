<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sektor;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SektorController extends Controller
{

      public function __construct()
    {
        $this->middleware('can:sektor list', ['only' => ['index', 'show']]);
        $this->middleware('can:sektor create', ['only' => ['create', 'store']]);
        $this->middleware('can:sektor edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:sektor delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sektors = (new Sektor)->newQuery();

        if (request()->has('search')) {
            $sektors->where('nama', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $sektors->orderBy($attribute, $sort_order);
        } else {
            $sektors->latest();
        }

        $sektors = $sektors->paginate(5)->onEachSide(2)->appends(request()->query());

        return Inertia::render('Admin/Sektor/Index', [
            'sektors' => $sektors,
            'filters' => request()->all('search'),
            'can' => [
                'create' => Auth::user()->can('sektor create'),
                'edit' => Auth::user()->can('sektor edit'),
                'delete' => Auth::user()->can('sektor delete'),
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Sektor/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $data = $request->all();
         if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $imageName = $image->getClientOriginalName();
            $image->move('icon/', $imageName);
            $data['icon'] = $imageName;
        } 
        
        Sektor::create($data);

        return redirect()->route('sektor.index')
                        ->with('message', __('Sektor created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Sektor $sektor)
    {
         return Inertia::render('Admin/Sektor/Show', [
            'sektor' => $sektor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sektor $sektor)
    {
        return Inertia::render('Admin/Sektor/Edit', [
            'sektor' => $sektor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sektor $sektor)
    {
         $data = $request->all();
         if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $imageName = $image->getClientOriginalName();
            $image->move('icon/', $imageName);
            $data['icon'] = $imageName;
        } 

        $sektor->update($data);

        return redirect()->route('sektor.index')
                        ->with('message', __('Sektor updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sektor $sektor)
    {
        $sektor->delete();

        return redirect()->route('sektor.index')
                        ->with('message', __('Sektor deleted successfully'));
    }
}
