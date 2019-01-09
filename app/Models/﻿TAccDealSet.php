<?php

namespace App\Models;

use Hash;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Database\DateFormatter;
use App\Traits\Filer\Filer;
use App\Models\AccountVip;

class TAccDealSet extends BaseModel
{
    use Filer,Slugger;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    public $timestamps = false;

    protected $config = 'model.account.t_acc_dealset.model';

    protected $connection = 'sqlsrv_accounts';

    protected $primaryKey = 'ID';

    //public function
}