<?php

namespace App\Imports;

use App\Models\Drug;
use App\Models\Medicine;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

// class DrugsImport implements ToModel, WithUpserts, WithBatchInserts, WithChunkReading, ShouldQueue,SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsOnError
class DrugsImport implements ToCollection, WithBatchInserts, WithChunkReading, ShouldQueue,SkipsEmptyRows, WithHeadingRow, WithValidation
{
    // use SkipsFailures,SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    // public function uniqueBy()
    // {
    //     return 'name';
    // }
    public function collection(Collection $rows)
    {
         Validator::make($rows->toArray(), [
             
            '*.name' => 'required',
            '*.contents' => 'required',
         ])->validate();

        foreach ($rows as $row) {
            $drug = new Drug;
            $drug->name = $row['name'];
            $drug->side_effects = explode('|',$row['side_effects']);
            $drug->contraindications = explode('|',$row['contraindications']);
            $drug->save();
            // dd($drug);
            $contents = explode('|',$row['contents']);
            foreach($contents as $content){
                $api = explode(':',$content)[0];
                $size = array_key_exists(1,explode(':',$content))? explode(':',$content)[1]:'';
                $medicine = Medicine::firstOrCreate(['name'=> $api]);
                if($medicine){
                    $drug->ingredients()->attach([
                        $medicine->id => ['size'=> $size]
                    ]);
                }
            }
        }
    }
    // public function model(array $row)
    // {   

    //     // $drug = new Drug([
    //     //     'name'     => $row['name'],
    //     // ]);
    //     // $drug
        
    //     // $contents = explode('|',$row['contents']);
    //     // foreach($contents as $content){
    //     //     $api = explode(':',$content)[0];
    //     //     $size = array_key_exists(1,explode(':',$content))? explode(':',$content)[1]:'';
    //     //     $medicine = Medicine::firstOrCreate(['name'=> $api]);
    //     //     if($medicine){
    //     //         dd($drug);
    //     //         $drug->ingredients()->attach([
    //     //             $medicine->id => ['size'=> $size]
    //     //         ]);
    //     //     }
    //     // }
    //     // return $drug;
    // }
    
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
             '*.contents' => 'required'
        ];
    }
}
