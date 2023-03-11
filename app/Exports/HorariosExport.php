<?php

namespace sisbio\Exports;

use sisbio\Horario;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class HorariosExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new MultiplesHojas('horarios');

        $sheets[] = new MultiplesHojas('turnos');

        return $sheets;
    }
}
