<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SoalController extends Controller
{
    //  public function index()
    // {
    //     return view('file-upload');
    // }

    public function submitSoal(Request $request)
    {
        if ($request->data['jenisSoal'] == 'essay') {
            $soal = new Soal;
            $soal->serverID = $request->data['serverID'];
            $soal->idKelas = $request->data['idLobby'];
            $soal->namaGuru = $request->data['namaGuru'];
            $soal->soal = $request->data['soal'];
            $soal->jenisSoal = $request->data['jenisSoal'];
            $soal->save();
        } else if ($request->data['jenisSoal'] == 'pilgan') {
            $soal = new Soal;
            $soal->serverID = $request->data['serverID'];
            $soal->idKelas = $request->data['idLobby'];
            $soal->namaGuru = $request->data['namaGuru'];
            $soal->soal = $request->data['soal'];
            $soal->jawabanA = $request->data['jawabana'];
            $soal->jawabanB = $request->data['jawabanb'];
            $soal->jawabanC = $request->data['jawabanc'];
            $soal->jawabanD = $request->data['jawaband'];
            $soal->jawabanBenar = $request->data['opsi'];
            $soal->jenisSoal = $request->data['jenisSoal'];
            $soal->save();
        }
        return $soal->id;
    }

    public function submitJawaban(Request $request)
    {
        $soal = Soal::find($request->data['id']);
        $jawabanEssay = null;
        if ($soal->jenisSoal == 'essay') {
            if ($request->data['jawaban']) {
                if ($request->data['jawaban'] == 'null') {
                    $jawabanEssay = 'Siswa Tidak Menjawab';
                } else {
                    $jawabanEssay = $request->data['jawaban'];
                }
            }
        }


        $jawaban = new Jawaban();
        $jawaban->idSoal = $request->data['id'];
        $jawaban->namaSiswa = $request->data['namaSiswa'];
        $jawaban->jawabanSiswa = $jawabanEssay ? $jawabanEssay : $request->data['indexJawaban'];
        $jawaban->save();
        return "Berhasil";
    }

    public function listBuku($id)
    {
        if ($id == 'all') {
            $jawaban = Book::all();
        } else {
            $jawaban = Book::where('kategori', '=', $id)->get();
        }
        // $jawaban = Book::all();
        return $jawaban;
    }

    public function downloadBuku($id)
    {
        $book = Book::findOrFail($id);
        $path = $book->path;
        return 'http://103.174.114.25:8000/' . $path;
    }

    public function searchBuku($id)
    {
        $book = Book::where('name', 'like', '%' . $id . '%')->get();
        return $book;
    }

    public function loginGameProcess(Request $request)
    {

        $user = User::where('username', $request->username)->first();
        if ($user) {
            $pass = Hash::check($request->password, $user->password);
            if ($pass) {
                return $user;
            }
        }
        return abort(500, 'custom error');
    }
}
