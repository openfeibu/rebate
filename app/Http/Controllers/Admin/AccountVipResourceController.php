<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use DB;
use App\Models\Vip;
use App\Models\VipRebate;
use App\Models\AccountVip;
use App\Models\Account;
use App\Models\AccountRebate;
use Illuminate\Http\Request;

class AccountVipResourceController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        $searchs = $request->input('search',[]);
        if ($this->response->typeIs('json')) {
            $account_vips =  app(Account::class)
                ->Join('AccountsVips as AV', 'AV.UserID', '=', 'AccountsInfo.UserID')
                ->leftJoin('AccountsRebates as AR', 'AR.UserID', '=', 'AccountsInfo.UserID');
                //->Join('Vips as V', 'V.VipID', '=', 'AV.VipID')
            if ($searchs) {
                foreach ($searchs as $search_key => $search_value)
                {
                    $account_vips = $account_vips->where(function ($account_vips) use($search_key,$search_value) {
                        if($search_value)
                        {
                            if($search_key == 'datetime')
                            {
                                $datetime = explode(' ~ ',$search_value);
                                $starttime = $datetime[0];
                                $endtime = $datetime[1];
                                $account_vips->where('AR.RebateDate', '>=', $starttime);
                                $account_vips->where('AR.RebateDate', '<=', $endtime);
                            }else{
                                $account_vips->where('AccountsInfo.'.$search_key, 'like', '%' . $search_value . '%');
                            }
                        }
                    });
                }
            }
            $account_vips=$account_vips->selectRaw('AccountsInfo.UserID,AccountsInfo.Accounts,MAX(AV.VipID) as VipID,SUM(AR.Rebate) as RebateTotal')
                ->groupBy('AccountsInfo.UserID')
                //->groupBy('V.VipName')
                ->groupBy('AccountsInfo.Accounts')
                ->orderBy('RebateTotal','desc')
                ->orderBy('UserID','desc')
                ->paginate($limit);
            $rebate_total = app(AccountRebate::class)
                ->Join('AccountsInfo as AI','AI.UserID','=','AccountsRebates.UserID');

            if ($searchs) {
                foreach ($searchs as $search_key => $search_value)
                {
                    $rebate_total = $rebate_total->where(function ($rebate_total) use($search_key,$search_value) {
                        if($search_value)
                        {
                            if($search_key == 'datetime')
                            {
                                $datetime = explode(' ~ ',$search_value);
                                $starttime = $datetime[0];
                                $endtime = $datetime[1];
                                $rebate_total->where('AccountsRebates.RebateDate', '>=', $starttime);
                                $rebate_total->where('AccountsRebates.RebateDate', '<=', $endtime);
                            }else{
                                $rebate_total->where('AI.'.$search_key, 'like', '%' . $search_value . '%');
                            }
                        }
                    });
                }
            }
            $rebate_total = $rebate_total->sum('AccountsRebates.Rebate');

            $account_vips_arr = $account_vips ? $account_vips->toArray()['data'] : [];
            $account_vips_key = array_keys($account_vips_arr);
            foreach ($account_vips_arr as $key => $account_vip) {
                $vip = app(Vip::class)->where('VipID', $account_vip['VipID'])->first();
                $account_vips_arr[$key]['VipName'] = $vip['VipName'];
            }
            array_unshift($account_vips_arr,['UserID' => '总计','RebateTotal'=>$rebate_total]);
            $data = $account_vips_arr;
            return $this->response
                ->success()
                ->count($account_vips->total())
                ->data($data)
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('account_vip.index')
            ->output();
    }
}
