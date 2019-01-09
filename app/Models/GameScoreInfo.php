<?php
/**
 *  金币信息表
 */
namespace App\Models;

use Hash;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Database\DateFormatter;
use App\Traits\Filer\Filer;
use App\Models\AccountVip;

class GameScoreInfo extends BaseModel
{
    use Filer,Slugger;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    public $timestamps = false;

    protected $config = 'model.account.game_score_info.model';

    protected $connection = 'sqlsrv_treasure';

    public $incrementing = false;

    //public function
}