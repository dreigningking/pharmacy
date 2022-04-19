<?php

namespace App\Imports;

use App\Models\MedicineRelationship;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class MedicineRelationshipsImport implements ToModel,WithBatchInserts, WithChunkReading, ShouldQueue,SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsOnError
{
    use SkipsFailures,SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MedicineRelationship([
            'medicine_a' => $row['medicine_a'],
            'medicine_aName'  => $row['medicine_aName'],
            'medicine_b'  => $row['medicine_b'],
            'medicine_bName'  => $row['medicine_bName'],
            'positive'  => $row['positive'],
            'remark'  => $row['remark'],
        ]);
    }
    public function batchSize(): int
    {
        return 1000;
    }
    public function chunkSize(): int
    {
        return 1000;
    }
    public function rules(): array
    {
        return [
            '*.medicine_a' => 'required|exists:medicines,id',
            '*.medicine_aName' => 'required|exists:medicines,name',
            '*.medicine_b'  =>  'required|exists:medicines,id',
            '*.medicine_bName'  =>  'required|exists:medicines,name',
            '*.positive'  =>  'required|boolean',
            '*.remark'  =>  'required|string',
        ];
    }
}
