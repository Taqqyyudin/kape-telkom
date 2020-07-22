<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    //
    protected $fillable = ['HOSTNAME','REGIONAL','IP' ,'JUMLAH HU','IDLE HU (100G)' ,'JUMLAH TE','IDLE TE (10G)' ,'JUMLAH GI','IDLE GI (1G)','JUMLAH INTERFACE','IDLE INTERFACE'];

    protected $primaryKey = 'HOSTNAME';
    public  $incrementing = false;
    protected $keyType = 'string';
}
