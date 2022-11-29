<?php

namespace App\Imports;

use App\Models\Drug;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class DrugsImport implements OnEachRow, WithChunkReading, ShouldQueue,SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsOnError
{
    use SkipsFailures,SkipsErrors;

    public function onRow(Row $row)
    {
        // $rowIndex = $row->getIndex();
        $row = $row->toArray();
        $value = session('imported_drugs') ?? collect([]);
        $drug = Drug::updateOrCreate(['name' => $row['name'],'manufacturer' => $row['manufacturer']],
                                        [
                                            'dosage_form' => $row['dosage_form']
                                        ]);
        $value->push($drug);
        session(['imported_drugs' => $value]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
    public function rules(): array
    {
        return [
             '*.name' => 'required',
             '*.manufacturer' => 'nullable',
             '*.dosage_form' => 'nullable',

        ];
    }
}
