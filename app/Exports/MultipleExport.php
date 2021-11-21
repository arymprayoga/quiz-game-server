<?php

namespace App\Exports;

use App\Models\Soal;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultipleExport implements WithMultipleSheets
{
    use Exportable;
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function sheets(): array
    {
        $sheets = [];
        $soal = Soal::where('idKelas', $this->id)->get();
        $nomor = 1;
        foreach ($soal as $key) {
            $sheets[] = new SoalExport($key->id, $nomor);
            $nomor++;
        }

        return $sheets;
    }

    public function title(): string
    {
        return 'bank_account';
    }
}
