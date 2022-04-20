<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file-upload');
    }

    public function store(Request $request)
    {
        return $request;
        // $validatedData = $request->validate([
        //     'file' => 'required|pdf|max:2048',
        //     'name' => 'required',
        //     'kategori' => 'required'
        // ]);

        // $name = $request->file('file')->getClientOriginalName();

        // $path = $request->file('file')->store('public/files');


        // $save = new Book;

        // $save->name = $name;
        // $save->path = $path;
        // $save->kategori = $request->kategori;

        // return redirect('file-upload')->with('status', 'File Has been uploaded successfully in laravel 8');
    }
}
