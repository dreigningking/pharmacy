<?php

namespace App\Imports\User;
use App\Models\Pharmacy;
use App\Models\Inventory;

use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
// use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
// use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class InventoriesImport implements ToCollection,WithHeadingRow, WithValidation, SkipsOnFailure, SkipsOnError,ShouldQueue,SkipsEmptyRows,WithChunkReading
{
    use SkipsFailures,SkipsErrors;
    public function collection(Collection $rows)
    {
        $pharmacy = Pharmacy::find(request()->pharmacy_id);
        $shelves = $pharmacy->shelves;
        $categories = $pharmacy->categories;
        foreach ($rows as $row) 
        {
            Inventory::create([
                'pharmacy_id' => $pharmacy->id,
                'name' => $row['name'],
                'category' => $row['category'],
                'shelf' => $row['shelf'],
                'unit_cost' => $row['unit_cost'],
                'unit_price' => $row['unit_cost'],
            ]);
            if($shelves && is_array($shelves)){
                if(!in_array($row['shelf'],$shelves)){
                    array_push($shelves,$row['shelf']);
                    $pharmacy->shelves = implode(',',$shelves);
                }
            }
            if($categories && is_array($categories)){
                if(!in_array($row['category'],$categories)){
                    array_push($categories,$row['category']);
                    $pharmacy->categories = implode(',',$categories);
                }
            }

        }
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
             '*.category' => 'required',
             '*.shelf' => 'required',
             '*.unit_cost' => 'required',
             '*.unit_price' => 'required',
        ];
    }
}