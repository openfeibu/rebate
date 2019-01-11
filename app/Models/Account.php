<?php

namespace App\Models;

use Hash,Auth;
use App\Models\User;
use App\Traits\Database\Slugger;
use App\Traits\Database\DateFormatter;
use App\Traits\Filer\Filer;
use App\Models\AccountVip;
use App\Models\TAccDealSet;
use App\Models\GameScoreInfo;
use App\Models\AccountRebate;
use Illuminate\Support\Facades\DB;

class Account extends User
{
    use Filer,Slugger;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    public $timestamps = false;

    protected $config = 'model.account.account.model';

    protected $connection = 'sqlsrv_accounts';

    protected $primaryKey = 'UserID';

    public function userVip()
    {
        return AccountVip::where('UserID',Auth::user()->UserID)->join('Vips','Vips.VipID','=','AccountsVips.VipId')->orderBy('AccountsVips.VipID','desc')->first();
    }
    public function userVipPriceTotal()
    {
        return AccountVip::where('UserID',Auth::user()->UserID)->join('Vips','Vips.VipID','=','AccountsVips.VipId')->sum('AccountsVips.Price');
    }

    public function vip($UserID)
    {
        return AccountVip::where('UserID',$UserID)->join('Vips','Vips.VipID','=','AccountsVips.VipId')->orderBy('AccountsVips.AccountVipID','desc')->first();
    }
    public function gameScoreInfo($UserID)
    {
        //$t_acc_dealset = TAccDealSet::where(['ID' => 1,'﻿IsOpen' => 1])->first();
        $game_score_info = GameScoreInfo::where('UserID',$UserID)->first();
        return $game_score_info;
    }

    public function userInsureScore()
    {
        $game_score_info = $this->gameScoreInfo(Auth::user()->UserID);
        $insure_score = $game_score_info->InsureScore;
        return $insure_score;
    }

    public function insureScore($UserID)
    {
        $game_score_info = $this->gameScoreInfo($UserID);
        $insure_score = $game_score_info->InsureScore;
        return $insure_score;
    }
    public function userRebateCount()
    {
        return AccountRebate::where('UserID',Auth::user()->UserID)->sum('Rebate');
    }
}