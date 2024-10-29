<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Type;

class ProductController extends Controller
{
public function indexFiltered(Request $request)
{

    $query = Product::query();
    
    if ($request->type) {
        $query->where('type_id', $request->type);
    }
    
    $products = $query->get();
    $types = Type::get();
    
    return view('products.index', compact('products', 'types'));
}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::get();
        $types = Type::get();
        return view('products.index', compact('products', 'types')); // pass the products to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // validazione dei dati
        $request->validate([
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required | numeric | min:0',
            'cover_image' => 'required | string',
            'slug' => 'nullable | string',
            'likes' => 'nullable | integer | min:0',
            'published' => 'nullable | boolean',
        ]);

        // creo lo slug da name
        $slug = $this->createSlug($request->name);
        $request->merge(['slug' => $slug]);


        Product::create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required | numeric | min:0',
            'cover_image' => 'required | string',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $productFound = Product::find($product->id);
        $productFound->delete();
        return redirect()->route('products.index');
    }

    // creo un metodo statico per creare lo slug
    public static function createSlug($name, string $divider = '-')
    {
        // replace non letter or digit by divider
        $name = preg_replace('~[^\pL\d]+~u', $divider, $name);
        
        // transliterate
        $name = iconv('utf-8', 'us-ascii//TRANSLIT', $name);
        
        // remove unwanted characters
        $name = preg_replace('~[^-\w]+~', '', $name);
        
        // trim
        $name = trim($name, $divider);
        
        // remove duplicate divider
        $name = preg_replace('~-+~', $divider, $name);
        
        // lowercase
        $name = strtolower($name);
        
        if (empty($name)) {
            return 'n-a';
        }
        
        return $name;
    }
}
