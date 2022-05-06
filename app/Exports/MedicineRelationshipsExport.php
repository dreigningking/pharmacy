<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MedicineRelationshipsExport implements FromArray,WithHeadings
{
    protected $relationship;

    public function __construct(array $relationship)
    {
        $this->relationship = $relationship;
    }

    public function array(): array
    {
        return $this->relationship;
    }

    public function headings(): array
    {
        return [
            'medicine_a',
            'medicine_aName',
            'medicine_b',
            'medicine_bName',
            'reaction'
        ];
    }
}
