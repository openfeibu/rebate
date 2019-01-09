<?php

namespace App\Models;

use Hash;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Database\DateFormatter;
use App\Traits\Filer\Filer;

class AccountRebate extends BaseModel
{
    use Filer,Slugger;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    public $timestamps = false;

    protected $config = 'model.account.account_rebate.model';

    protected $connection = 'sqlsrv_accounts';

    protected $primaryKey = 'RebateID';


}