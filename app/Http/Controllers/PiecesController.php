<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PiecesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pieces = Piece::all();



        return view('pieces/pieces', [
            'pieces' => $pieces
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

        Piece::create([
            'brand_name' => $request->brand_name,
            'description' => $request->description,
            'type' => $request->type,
            'name' => $request->name,
            'image' => $request->image,
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            
            $filename = $image->getClientOriginalName();
            $filename = str_replace(' ', '_', $filename);

            Storage::disk('public')->put($filename, File::get($image));
        }

        return redirect()->back()->with(['message', 'Piece created successfully!']);

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
