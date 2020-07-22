<?php

namespace App\Exports;

use App\Node;
use Maatwebsite\Excel\Concerns\FromCollection;

class NodeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Node::all();
    }
}
