<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Category;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home', [
            'files' => File::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('file.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $formFields = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $formFields['downloads_count'] = 0;

        $formFields['url'] = request()->file('file')->store('files', 'public');

        $formFields['user_id'] = auth()->id();
        File::create($formFields);

        return redirect('/home')->with('success', 'listing has been added successfuly !');

    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return view('file.show', [
            'file' => $file
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
