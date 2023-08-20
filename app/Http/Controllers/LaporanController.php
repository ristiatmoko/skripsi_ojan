<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductStock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $query = ProductStock::query()->with('product');
        $query = ProductStock::query()->latest();
        $query2 = Product::query()->latest();

        $date = $request->date_filter;

        switch ($date) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'yesterday':
                $query->whereDate('created_at', Carbon::yesterday());
                break;
            case 'this-week':
//                $query->whereDate('created_at', Carbon::);
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek()->format('Y-m-d'),Carbon::now()->endOfWeek()->format('Y-m-d')]);
                break;
//            case 'last-week':
//                $query->whereDate('created_at', [Carbon::now()->subWeek(),Carbon::now()]);
//                break;
            case 'this-month':
                $query->whereBetween('created_at', [Carbon::now()->startOfMonth()->format('Y-m-d'),Carbon::now()->endOfMonth()->format('Y-m-d')]);
                break;
            case 'this-year':
                $query->whereBetween('created_at', [Carbon::now()->firstOfYear()->format('Y-m-d'),Carbon::now()->endOfYear()->format('Y-m-d')]);
                break;

        }

        $stocks = $query->get();
        $products = $query2->get();

//        dd($products);

        return view('dashboard.laporan.index', compact('stocks', 'products'));


//        return view('dashboard.laporan.index', [
//            'products' => Product::latest()->filter(\request(['search']))->paginate(500),
//         ]);
    }

    public function records(Request $request)
    {
        if ($request->ajax()) {
            $stocks = ProductStock::all();

            return response()->json([
                'stocks' => $stocks
            ]);
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
