<?php

namespace App\Imports;

use App\Node;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Row;
use DB;
use Maatwebsite\Excel\Concerns\WithStartRow;

class NodeImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function Model(array $row)
    {

        return new Node([
                'HOSTNAME' => $row[1],
                'REGIONAL' => $row[0],
                'IP' => $row[2],
                'JUMLAH HU' => $row[3],
                'IDLE HU (100G)' => $row[4],
                'JUMLAH TE' => $row[5],
                'IDLE TE (10G)' => $row[6],
                'JUMLAH GI' => $row[7],
                'IDLE GI (1G)' => $row[8],
                'JUMLAH INTERFACE' => $row[9],
                'IDLE INTERFACE' => $row[10],
        ]);

        // **
        // $row = $row -> toArray();

        // $node = Node::FirstOrcreate(
        //     ['HOSTNAME' => $row[1]],
        //     [
        //         'REGIONAL' => $row[0],
        //         'IP' => $row[2],
        //         'JUMLAH HU' => $row[3],
        //         'IDLE HU (100G)' => $row[4],
        //         'JUMLAH TE' => $row[5],
        //         'IDLE TE (10G)' => $row[6],
        //         'JUMLAH GI' => $row[7],
        //         'IDLE GI (1G)' => $row[8],
        //         'JUMLAH INTERFACE' => $row[9],
        //         'IDLE INTERFACE' => $row[10],
        //     ]
        //     );
        // if (! $node->wasRecentlyCreated){
        //     $node->update([
        //         'HOSTNAME' => $row[1],
        //         'REGIONAL' => $row[0],
        //         'IP' => $row[2],
        //         'JUMLAH HU' => $row[3],
        //         'IDLE HU (100G)' => $row[4],
        //         'JUMLAH TE' => $row[5],
        //         'IDLE TE (10G)' => $row[6],
        //         'JUMLAH GI' => $row[7],
        //         'IDLE GI (1G)' => $row[8],
        //         'JUMLAH INTERFACE' => $row[9],
        //         'IDLE INTERFACE' => $row[10],
        //     ]);

        // **
        }
}


