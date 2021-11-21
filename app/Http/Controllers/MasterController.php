<?php

namespace App\Http\Controllers;

use App\Exports\MultipleExport;
use App\Exports\SoalExport;
use App\Models\Book;
use App\Models\Jawaban;
use App\Models\Soal;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

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
                return '<a data-toggle="modal" data-target="#modalubahuser" data-id="' . $data->id . '" data-name="' . $data->name . '" data-nip="' . $data->nip . '" data-username="' . $data->username . '" class="btn btn-xs btn-primary mr-2" ><i class="fas fa-edit"></i></a>
                <a data-toggle="modal" data-target="#modalhapususer" data-id="' . $data->id . '" data-name="' . $data->name . '" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>';
            })->make(true);
        }
    }

    public function deleteDataMasterUser(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);
        $user = User::findOrFail($request->id);
        $user->delete();
        if($user){
            Alert::success('Berhasil!', 'Berhasil melakukan hapus data');
        } else {
            Alert::error('Gagal!', 'Terjadi error saat menghapus data');
        }
        return back();
    }

    public function addDataMasterUser(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255|unique:users',
            'name' => 'required',
            'nip' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => Hash::make($request->password)
        ]);

        if($user){
            Alert::success('Berhasil!', 'Berhasil melakukan edit data');
        } else {
            Alert::error('Gagal!', 'Terjadi error saat menginput data');
        }
        
        return back();
    }

    public function editDataMasterUser(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'name' => 'required',
            'nip' => 'required',
            'password' => 'required',
        ]);

        $request->merge(['password' => Hash::make($request->password)]);

        $user = User::findOrFail($request->id);
        $user->update($request->all());

        if($user){
            Alert::success('Berhasil!', 'Berhasil melakukan edit data');
        } else {
            Alert::error('Gagal!', 'Terjadi error saat menginput data');
        }
        
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

    public function getViewMasterSoal()
    {
        return view('master.master-soal');
    }

    public function getDataMasterSoal(Request $request)
    {
        if ($request->ajax()) {
            $data = Soal::where('serverID', Auth::user()->id)->groupBy('idKelas')->get();
            return Datatables::of($data)->addColumn('tanggal', function ($data) {
                $tanggal = Carbon::parse($data->created_at)->formatLocalized('%d %B %Y');
                return $tanggal;
            })->addColumn('action', function ($data) {
                return '<a href="'.route('detail-soal-get', $data->idKelas).'" class="btn btn-xs btn-success"><i class="fas fa-edit"></i></a>';
            })->make(true);
        }
    }

    public function getViewMasterDetailSoal($id)
    {
        $pilgan = Soal::where('idKelas', $id)->where('jenisSoal', 'pilgan')->get();
        $essay = Soal::where('idKelas', $id)->where('jenisSoal', 'essay')->get();

        return view('master.master-soal-detail', compact('pilgan', 'essay', 'id'));
    }
    
    public function exportExcel($id){
        $soal = Soal::where('idKelas', $id)->first();
        $tanggal = date('Y-m-d');
        return Excel::download(new MultipleExport($id), $tanggal.' - '.$id.'.xlsx');
    }

    
}
