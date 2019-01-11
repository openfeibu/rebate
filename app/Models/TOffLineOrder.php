<?php

namespace App\Models;

use Hash,Auth;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use Illuminate\Support\Facades\DB;

class TOffLineOrder extends BaseModel
{
    use Filer,Slugger;

    public $timestamps = false;

    protected $config = 'model.account.t_off_line_order.model';

    protected $connection = 'sqlsrv_agent';

    protected $primaryKey = 'ID';


}