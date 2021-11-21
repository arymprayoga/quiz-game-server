<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soal';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idKelas',
        'serverID',
        'namaGuru',
        'soal',
        'jawabanA',
        'jawabanB',
        'jawabanC',
        'jawabanD',
        'jawabanBenar',
        'jenisSoal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'serverID', 'id');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'idSoal');
    }
}
