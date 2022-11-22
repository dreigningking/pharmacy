<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MedicineInteractionsExport implements FromArray,WithHeadings
{
    protected $interaction;

    public function __construct(array $interaction)
    {
        $this->interaction = $interaction;
    }

    public function array(): array
    {
        return $this->interaction;
    }

    public function headings(): array
    {
        return [
            'medicine_a',
            'medicine_aName',
            'medicine_b',
            'medicine_bName',
            'remark',
            'mechanism'
        ];
    }
}
