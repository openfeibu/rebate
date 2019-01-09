<?php
/**
 * 充值记录表
 */
namespace App\Models;

use Hash;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Database\DateFormatter;
use App\Traits\Filer\Filer;

class ShareDetailInfo extends BaseModel
{
    use Filer,Slugger;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    public $timestamps = false;

    protected $config = 'model.account.share_detail_info.model';

    protected $connection = 'sqlsrv_treasure';

    protected $primaryKey = 'DetailID';

}