<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvestorRequest;
use Illuminate\Http\Request;
use App\Models\Investor;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class InvestorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:investor list', ['only' => ['index', 'show']]);
        $this->middleware('can:investor create', ['only' => ['create', 'store']]);
        $this->middleware('can:investor edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:investor delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $investors = (new Investor)->newQuery();

        if (request()->has('search')) {
            $investors->where('nama', 'Like', '%' . request()->input('search') . '%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $investors->orderBy($attribute, $sort_order);
        } else {
            $investors->latest();
        }

        $investors = $investors->paginate(5)->onEachSide(2)->appends(request()->query());

        return Inertia::render('Admin/Investor/Index', [
            'investors' => $investors,
            'filters' => request()->all('search'),
            'can' => [
                'create' => Auth::user()->can('investor create'),
                'edit' => Auth::user()->can('investor edit'),
                'delete' => Auth::user()->can('investor delete'),
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Investor/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvestorRequest $request)
    {

        Investor::create($request->all());

        return redirect()->route('investor.index')
            ->with('message', __('Investor created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Investor $investor)
    {
        return Inertia::render('Admin/Investor/Show', [
            'investor' => $investor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investor $investor)
    {
        return Inertia::render('Admin/Investor/Edit', [
            'investor' => $investor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investor $investor)
    {
        $investor->update($request->all());

        return redirect()->route('investor.index')
            ->with('message', __('Investor updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investor $investor)
    {
        $investor->delete();

        return redirect()->route('investor.index')
            ->with('message', __('Investor deleted successfully'));
    }
}