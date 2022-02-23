<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');        
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.destroy')->only('destroy');        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = [
            'red' => 'Rojo',
            'yellow' => 'Amarillo',
            'green' => 'Verde',
            'blue' => 'Azul',
            'indigo' => 'Índigo',
            'purple' => 'Morado',
            'pink' => 'Rosa'
        ];
        
        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required'           
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->color = $request->color;
        $tag->save();        

        return redirect(route('admin.tags.edit', $tag))->with('info', 'La etiqueta se ha creado con éxito');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'Rojo',
            'yellow' => 'Amarillo',
            'green' => 'Verde',
            'blue' => 'Azul',
            'indigo' => 'Índigo',
            'purple' => 'Morado',
            'pink' => 'Rosa'
        ];

        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required'            
        ]);
        
        $request->slug = Str::slug($request->name);
        $tag->update($request->all());

        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta se actualizó con éxito'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se eliminó con éxito'); ;
    }
}
