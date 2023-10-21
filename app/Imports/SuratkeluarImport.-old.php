<?php

namespace App\Imports;

use App\Models\Suratkeluar;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SuratkeluarImport implements WithHeadingRow,ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Collection|null
    */
    public function collection(collection $collection)
    {
        return new Suratkeluar([
            'no_surat'=>$row['no_surat'], 
            'tgl_surat'=>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_surat'])->format('Y-m-d'),
            'tgl_keluar'=>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_keluar'])->format('Y-m-d'),
            'tujuan'=>$row['tujuan'],
            'ringkasan'=>$row['isi'],
            'file_surat'=>$row['file']
        ]);
    }
}
