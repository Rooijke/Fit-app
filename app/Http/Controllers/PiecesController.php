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


//    public function store(Request $request)
//    {
//
//        Piece::create([
//            'brand_name' => $request->brand_name,
//            'description' => $request->description,
//            'type' => $request->type,
//            'name' => $request->name,
//            'image' => $request->image,
//        ]);
//
//        if($request->hasFile('image')){
//            $file = $request->file('image'); // Get the uploaded file
//            $filename = $file->getClientOriginalName(); // Get the original filename
//            $filename = str_replace(' ', '_', $filename); // Replace spaces with underscores
//            Storage::disk('image_disk')->put($filename, File::get($file)); // Store the file on the disk
//        }
//
//        return redirect()->back()->with(['message', 'Piece created successfully!']);
//    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|max:255',
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $piece = new Piece();
        $piece->brand_name = $validatedData['brand_name'];
        $piece->description = $validatedData['description'];
        $piece->type = $validatedData['type'];
        $piece->name = $validatedData['name'];

        if($request->hasFile('image')){
            $file = $request->file('image'); // Get the uploaded file
            $filename = $file->getClientOriginalName(); // Get the original filename
            $filename = str_replace(' ', '_', $filename); // Replace spaces with underscores
            Storage::disk('public')->put('images/'.$filename, File::get($file)); // Store the file on the disk
            $piece->image = $filename;
        }

        $piece->save();

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
