<?php

namespace App\Imports;

use App\Models\Medicine;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class MedicinesImport implements ToModel, WithUpserts, WithBatchInserts, WithChunkReading, ShouldQueue,SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsOnError
{
    use SkipsFailures,SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function collection(Collection $rows)
    // {
    //      Validator::make($rows->toArray(), [
             
    //         '*.name' => 'required',
    //         '*.curables' => 'nullable',
    //         '*.contraindications' => 'nullable',
    //         '*.side_effect' => 'nullable'
    //      ])->validate();

    //     foreach ($rows as $row) {
    //         Medicine::updateOrCreate(
    //             ['name' => $row[0]],
    //             [
    //                 'curables' => explode('|',$row[1]),
    //                 'contraindications' => explode('|',$row[2]),
    //                 'side_effect' => explode('|',$row[3]),
    //             ]);
    //     }
    // }
    public function uniqueBy()
    {
        return 'name';
    }
    public function model(array $row)
    {
        return new Medicine([
            'name'     => $row['name'],
            'curables'    => explode('|',$row['curables']),
            'contraindications' => explode('|',$row['contraindications']),
            'side_effects' => explode('|',$row['side_effects']),
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
             '*.name' => 'required',
             '*.curables' => 'required',
             '*.contraindications' => 'nullable',
             '*.side_effect' => 'nullable'
        ];
    }
}
