<?php

namespace App\Exports;

use App\Models\Soal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class SoalExport implements FromView, ShouldAutoSize, WithTitle
{
    use Exportable;
    protected $id;
    protected $nomor;

    function __construct($id, $nomor)
    {
        $this->id = $id;
        $this->nomor = $nomor;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $soal = Soal::find($this->id);
        return view('export.jawaban', compact('soal'));
    }

    public function title(): string
    {
        return 'Soal '.$this->nomor;
    }
}
