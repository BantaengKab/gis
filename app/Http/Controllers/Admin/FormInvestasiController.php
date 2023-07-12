<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormInvestasi;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FormInvestasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:forminvestasi list', ['only' => ['index', 'show']]);
        $this->middleware('can:forminvestasi delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forminvestasis = (new FormInvestasi)->newQuery();

        if (request()->has('search')) {
            $forminvestasis->where('nama', 'Like', '%' . request()->input('search') . '%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $forminvestasis->orderBy($attribute, $sort_order);
        } else {
            $forminvestasis->latest();
        }

        $forminvestasis = $forminvestasis->paginate(5)->onEachSide(2)->appends(request()->query());

        return Inertia::render('Admin/FormInvestasi/Index', [
            'forminvestasis' => $forminvestasis,
            'filters' => request()->all('search'),
            'can' => [
                'delete' => Auth::user()->can('forminvestasi delete'),
            ]
        ]);
    }

    
    public function show(FormInvestasi $forminvestasi)
    {
        return Inertia::render('Admin/FormInvestasi/Show', [
            'forminvestasi' => $forminvestasi,
        ]);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormInvestasi $forminvestasi)
    {
        $forminvestasi->delete();

        return redirect()->route('forminvestasi.index')
            ->with('message', __('FormInvestasi deleted successfully'));
    }
}