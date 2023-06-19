<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return Product::all();
        return view('dashboard.products.index', [
            'products' => Product::latest()->filter(\request(['search']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'product_slug' => 'required|unique:products',
            'category_id' => 'required',
            'product_stock' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $category = Category::query()->find($validatedData['category_id']);

        if($product = Product::query()->create($validatedData)){
            $product->update([
                'unique_id' => strtoupper(
                    substr(
                        str_replace(' ','',$category->category_name),
                        0,3)
                    .'-') .
                    sprintf("%05s", $product->id)
            ]);
        } else {
            return redirect('/dashboard/product')->with('error', 'Failed to add product!');
        }
        return redirect('/dashboard/product')->with('success', 'New product has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('dashboard.products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $rules = [
            'product_name' => 'required|max:255',
            'category_id' => 'required',
            'product_stock' => 'required'
        ];

        if ($request->product_slug  != $product->product_slug) {
            $rules['product_slug'] = 'required|unique:products';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Product::where('id', $product->id)
                ->update($validatedData);
        return redirect('/dashboard/product')->with('success', 'New product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        Product::destroy($product->id);
        return redirect('/dashboard/product')->with('success', 'New product has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $product_slug = SlugService::createSlug(Product::class, 'product_slug', $request->product_name);
        return response()->json(['product_slug' => $product_slug]);
    }

    public function delete($id)
    {
        $data =  Product::find($id);
        $data->delete();

        return redirect('/dashboard/product')->with('success', 'New product has been deleted!');
    }
}
