<?php

namespace App\Imports;

use App\Models\Inventory;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
class InventoriesImport implements ToModel,SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inventory([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => 'secret',
        ]);
    }

    public function rules(): array
    {
        return [
            'email' => Rule::in(['patrick@maatwebsite.nl']),

             // Above is alias for as it always validates in batches
             '*.email' => Rule::in(['patrick@maatwebsite.nl']),
        ];
    }
    public function onFailure(Failure ...$failures)
    {
        // Handle the failures how you'd like.
    }

    // public function collection(Collection $rows)
    // {
    //      Validator::make($rows->toArray(), [
    //          '*.0' => 'required',
    //      ])->validate();
    //     foreach ($rows as $row) {
    //         User::create([
    //             'name' => $row[0],
    //         ]);
    //     }
    // }
}
