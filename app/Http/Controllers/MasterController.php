<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Response;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getViewMasterUser()
    {
        $dataUser = User::all();
        return view('master.master-user', compact('dataUser'));
    }

    public function getDataMasterUser(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)->addColumn('action', function ($data) {
                return '<a data-toggle="modal" data-target="#modalubahuser" data-id="' . $data->id . '" data-username="' . $data->name . '" data-email="' . $data->email . '" class="btn btn-xs btn-primary mr-2" ><i class="fas fa-edit"></i></a>
                <a data-toggle="modal" data-target="#modalhapususer" data-id="' . $data->id . '" data-username="' . $data->name . '" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>';
            })->make(true);
        }
    }

    public function deleteDataMasterUser(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);
        $user = User::findOrFail($request->idUser);
        $user->delete();
        return back();
    }

    public function addDataMasterUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back();
    }

    public function getViewMasterBuku()
    {
        // $dataBuku = Book::all();
        return view('master.master-buku');
        // $test = Storage::url('uploads/1632749247_3201012908970010_kartuUjian.pdf');
        // return response()->file('/storage/uploads/1632749247_3201012908970010_kartuUjian.pdf');;
    }

    public function getDataMasterBuku(Request $request)
    {
        if ($request->ajax()) {
            $data = Book::all();
            return Datatables::of($data)->addColumn('action', function ($data) {
                return '<a data-toggle="modal" data-target="#modalubahbuku" data-id="' . $data->id . '" data-name="' . $data->name . '" class="btn btn-xs btn-primary mr-2" ><i class="fas fa-edit"></i></a>
                <a data-toggle="modal" data-target="#modalhapusbuku" data-id="' . $data->id . '" data-name="' . $data->name . '" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
                <a href="get-pdf/'. $data->id .'" class="btn btn-xs btn-success"><i class="fas fa-book"></i></a>';
            })->make(true);
        }
    }

    public function deleteDataMasterBuku(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);
        $user = Book::findOrFail($request->idUser);
        $user->delete();
        return back();
    }

    public function addDataMasterBuku(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
            'name' => 'required',
        ]);

        // $fileModel = new Book;
        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $books = Book::create([
                'name' => $request->name,
                'path' => 'storage/' . $filePath,
            ]);

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }

        return back()->withErrors(['msg' => 'The Message']);
    }

    public function getPdfFile($id){
        $book = Book::findOrFail($id);
        $path = $book->path;
        $response = Response::make($path, 200);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-disposition','attachment; filename="'.$book->name.'.pdf"');
        return $response;
        // return response()->file($path, $book->name);
    }

    
}
