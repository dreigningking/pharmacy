<?php

namespace App\Imports;

use App\Models\Disease;
use Maatwebsite\Excel\Concerns\ToModel;

class DiseasesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Disease([
            //
        ]);
    }
}
