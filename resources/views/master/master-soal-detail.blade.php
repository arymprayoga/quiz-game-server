@extends('layouts.app-new')

@section('content')
    <br>
    <a href="{{route('export-soal', $id)}}" class="btn btn-primary"><span class="fa fa-print"></span> Export</a>
    <div class="card mt-2 card-primary">
        <div class="card-header">
            <h2 class="card-title">Soal Pilihan Ganda</h2>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @php
                $i = 1;
            @endphp
            @foreach ($pilgan as $item)
                <p>Soal : {{ $item->soal }}</p>
                <p>Jawaban Benar : @php
                    
                    switch ($item->jawabanBenar) {
                        case '1':
                            echo 'A';
                            break;
                        case '2':
                            echo 'B';
                            break;
                    
                        case '3':
                            echo 'C';
                            break;
                    
                        case '4':
                            echo 'D';
                            break;
                    
                        default:
                            echo 'E';
                            break;
                } @endphp </p>
                <table class="table table-bordered table-striped" id="">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Jawaban Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->jawaban as $itemJawaban)
                            <tr>
                                <td>{{ $itemJawaban->namaSiswa }}</td>
                                <td>@php
                                    
                                    switch ($itemJawaban->jawabanSiswa) {
                                        case '0':
                                            echo 'Siswa Tidak Menjawab';
                                            break;
                                        case '1':
                                            echo 'A';
                                            break;
                                        case '2':
                                            echo 'B';
                                            break;
                                    
                                        case '3':
                                            echo 'C';
                                            break;
                                    
                                        case '4':
                                            echo 'D';
                                            break;
                                    
                                        default:
                                            echo 'E';
                                            break;
                                } @endphp</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
            @endforeach
        </div>
    </div>

    <div class="card mt-2 card-success">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <h2 class="card-title">Soal Essay</h2>
        </div>
        <div class="card-body">
            @foreach ($essay as $item)
                <p>Soal : {{ $item->soal }}</p>

                <table class="table table-bordered table-striped" style="table-layout: fixed; width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 20%">Nama Siswa</th>
                            <th style="width: 80%">Jawaban Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->jawaban as $itemJawaban)
                            <tr>
                                <td>{{ $itemJawaban->namaSiswa }}</td>
                                <td style="white-space: normal !important; word-wrap: break-word">{{ $itemJawaban->jawabanSiswa }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
            @endforeach
        </div>
    </div>

@endsection
