<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\KlipingModel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        dd(request('search'));



        return view('product', [
            'title' => 'Product',
            'products' => Product::latest()->filter(\request(['search']))->paginate(10)
//            'products' => Product::latest()->get()->load('category'), / lazy eager loading
//            with(['category'])-> / clockwork
//            'categories' => Category::all()
        ]);
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

    public function getKliping()
    {
        $data = KlipingModel::select('*')
            ->join('tb_kat_berita', 'tb_kliping.id_kat_berita', '=', 'tb_kat_berita.id_kat_berita')
            ->where('tb_kliping.id_stat_kliping', 2)
            ->limit(100)
            ->get();
        return DataTables::of($data)->make(true);
    }
}
