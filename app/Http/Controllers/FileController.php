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
            'files' => File::with('user', 'category')->filter(request(['category']))->orderBy('downloads_count', 'desc')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('file.create', [
            'categories' => Category::all(),
            'file' => null
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

        return redirect('/')->with('success', 'listing has been added successfuly !');

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
        return view('file.create', [
            'file' => $file,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(File $file)
    {
        $form_fields = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $formFields['url'] = request()->file('file')->store('files', 'public');

        $file->update($form_fields);

        return redirect()->route('file.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        $file->delete();
        return back();
    }

    public function download(File $file){
        
        if(auth()->check()) {
            
            $file->downloads_count ++;
            $file->update([
                'downloads_count' => $file->downloads_count
            ]);
    
            return response()->download(storage_path('app/public/' . $file->url));

        }

        return back()->withErrors(['error' => 'You cannot download this file if you are not logged in !']);
    }

    public function manage(){
        if (auth()->user()->id == 1) {
            return view('file.manage', [
                'files' => File::with('user')->where('user_id', auth()->id())->get(),
            ]);
        }
        else {
            return view('file.manage', [
                'files' => File::all()
            ]);
        }
    }
}
