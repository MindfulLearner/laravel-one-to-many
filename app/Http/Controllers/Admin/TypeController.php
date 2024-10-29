<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::get();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        
        // creo lo slug da name
        $slug = $this->createSlug($request->title);
        $request->merge(['slug' => $slug]);
        // validazione dei dati
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:types,slug',
        ]);


        Type::create($request->all());

        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $type->update($request->all());
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('types.index');
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
