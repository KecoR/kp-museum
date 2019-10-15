<?php

namespace App\Exports;

use App\TbPengunjung;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataPengunjung implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return json_decode(DB::table('tb_pengunjung')->select('nama', 'warga_negara', 'asal', 'email', 'no_hp', 'child', 'college', 'adult', 'total_harga', 'tanggal')->orderBY('tanggal', 'ASC')->get());
    }

    public function headings(): array
    {
        return [
            'Nama Pengunjung',
            'Warga Negara',
            'Asal',
            'Email',
            'No Hp',
            'Child',
            'College',
            'Adult',
            'Total Harga',
            'Tanggal',
        ];
    }
}
