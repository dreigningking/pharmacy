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

// class MedicineRelationshipsImport implements ToModel
class MedicineRelationshipsImport implements ToModel,WithHeadingRow,SkipsEmptyRows,WithBatchInserts, WithChunkReading, ShouldQueue
{
    // use SkipsFailures,SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        // dd($row);
        return new MedicineRelationship([
            'medicine_a' => $row['medicine_a'],
            'medicine_b'  => $row['medicine_b'],
            'reaction'  => $row['reaction']
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
            '*.medicine_a' => 'required|numeric|exists:medicines,id',
            '*.medicine_aName' => 'required|exists:medicines,name',
            '*.medicine_b'  =>  'required|numeric|exists:medicines,id',
            '*.medicine_bName'  =>  'required|exists:medicines,name',
            '*.reaction'  =>  'required|string',
        ];
    }
}
