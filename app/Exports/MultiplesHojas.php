<?php

namespace sisbio\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

use sisbio\Horario;
use sisbio\Personal;
use sisbio\UnidadArea;


class MultiplesHojas implements FromView, WithTitle
{
    private $hoja;

    public function __construct(string $hoja)
    {
        $this->hoja = $hoja;
    }

    /**
     * @return Builder
     */
     public function view(): View
     {
       $horarios = Horario::all();

       $personals = Personal::all();

       $areas = UnidadArea::all();

       foreach ($areas as $area) {
         $array_area[$area->id] = $area->name;
       }

       if($this->hoja == 'turnos')
       {
         return view('parcials.ajuste_turnos',compact('personals','array_area'), [
               'invoices' => Personal::all()
         ]);
       }
       else{
         return view('parcials.ajuste_horarios',compact('horarios'), [
           'invoices' => Personal::all()
         ]);
       }

     }

    /**
     * @return string
     */
    public function title(): string
    {
      if($this->hoja == 'turnos')
      {
        return 'Ajuste de Turnos';
      }
      else{
        return 'Ajuste de Horarios';
      }
    }
}

?>
