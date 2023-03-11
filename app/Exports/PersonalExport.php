<?php

namespace sisbio\Exports;

use sisbio\Personal;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PersonalExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
      $personals = Personal::all();
        return view('parcials.personal_config',compact('personals'), [
            'invoices' => Personal::all()
        ]);
    }
}
