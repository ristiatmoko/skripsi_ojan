<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        if (auth()->guest()) {
//            abort(403);
//        }

//        $this->authorize('admin');
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
//            'category_slug' => 'required|unique:categories'
        ]);

//        $validatedData['user_id'] = auth()->user()->id;
////        $category = Category::query()->find($validatedData['category_id']);
//
//        if($product = Product::query()->create($validatedData)){
//            $product->update([
//                'unique_id' => strtoupper(
//                        substr(
//                            str_replace(' ','',$category->category_name),
//                            0,3)
//                        .'-') .
//                    sprintf("%05s", $product->id)
//            ]);
//        } else {
//            return redirect('/dashboard/product')->with('error', 'Failed to add product!');
//        }

        Category::query()->create($validatedData);
        return redirect('/dashboard/category')->with('success', 'Kategori baru telah ditambakan!');
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
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category
//            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'category_name' => 'required|max:255',
//            'category_slug' => 'required|unique:categories'
        ];

//        if ($request->category_slug  != $category->category_slug) {
//            $rules['category_slug'] = 'required|unique:categories';
//        }

        $validatedData = $request->validate($rules);

//        $validatedData['user_id'] = auth()->user()->id;

        Category::where('id', $category->id)
            ->update($validatedData);
        return redirect('/dashboard/category')->with('success', 'Ketegori baru telah diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/category')->with('success', 'Kategori baru telah dihapus!');

    }

//    public function checkSlug(Request $request)
//    {
//
//        $category_slug = SlugService::createSlug(Category::class, 'category_slug', $request->category_name);
//        return response()->json(['category_slug' => $category_slug]);
//    }
}
