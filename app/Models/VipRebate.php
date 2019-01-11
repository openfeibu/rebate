<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;

class VipRebate extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable, LogsActivity;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'model.account.vip_rebate.model';
    protected $connection = 'sqlsrv_accounts';

    public $timestamps = false;

    protected $primaryKey = 'VipRebateID';

}
