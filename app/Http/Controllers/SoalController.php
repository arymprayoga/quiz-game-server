<?php
 
namespace App\Http\Controllers;

use App\Models\Jawaban;
use Illuminate\Http\Request;
use App\Models\Soal;
 
class SoalController extends Controller
{
    //  public function index()
    // {
    //     return view('file-upload');
    // }
 
    public function submitSoal(Request $request){
        if($request->data['jenisSoal'] == 'essay'){
            $soal = new Soal;
            $soal->idKelas = $request->data['idLobby'];
            $soal->namaGuru = $request->data['namaGuru'];
            $soal->soal = $request->data['soal'];
            $soal->jenisSoal = $request->data['jenisSoal'];
            $soal->save();
        } else if ($request->data['jenisSoal'] == 'pilgan'){
            $soal = new Soal;
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

    public function submitJawaban(Request $request){
        $jawaban = new Jawaban();
        $jawaban->idSoal = $request->data['id'];
        $jawaban->namaSiswa = $request->data['namaSiswa'];
        $jawaban->jawabanSiswa = $request->data['jawaban'];
        $jawaban->save();
        return "Berhasil";
    }

    public function listBuku(Request $request){
        $jawaban = Jawaban::all();
        return $jawaban;
    }
}