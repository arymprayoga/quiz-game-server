<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <table>
        <tbody>
            <tr>
                <td colspan="2">Soal : </td>
                <td colspan="8">{{ $soal->soal }}</td>
            </tr>
            @if ($soal->jenisSoal == 'pilgan')
                <tr>
                    <td colspan="2">
                        Jawaban Benar :
                    </td>
                    <td colspan="8">
                        @php                            
                            switch ($soal->jawabanBenar) {
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
                        } @endphp
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    @if ($soal->jenisSoal == 'pilgan')
    <table id="customers">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th colspan="8">Jawaban Siswa</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($soal->jawaban as $itemJawaban)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $itemJawaban->namaSiswa }}</td>
                    <td colspan="8">@php
                        
                        switch ($itemJawaban->jawabanSiswa) {
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
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    </table>
    @endif
    @if ($soal->jenisSoal == 'essay')
    <table id="customers">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th colspan="8">Jawaban Siswa</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($soal->jawaban as $itemJawaban)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $itemJawaban->namaSiswa }}</td>
                    <td colspan="8">{{$itemJawaban->jawabanSiswa}}</td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    </table>
    @endif
    
</body>

</html>
