<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Vip;
use App\Models\AccountRebate;
use App\Models\AccountVip;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\VipRepositoryInterface;
use App\Repositories\Eloquent\AccountRebateRepositoryInterface;

class VipResourceController extends BaseController
{
    public function __construct(VipRepositoryInterface $vip_repository
        //,AccountRebateRepositoryInterface $account_rebate_repository
    )
    {
        parent::__construct();
        $this->repository = $vip_repository;
        //$this->account_rebate_repository = $account_rebate_repository;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
//        $this->account_rebate_repository
//            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->orderBy('VipID','asc')
                ->all();
            $data = $data ? $data->toArray() : [];
            return $this->response
                ->success()
                ->data($data)
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('vip.index')
            ->output();
    }

    public function update(Request $request,Vip $vip)
    {
        try {
            $attributes = $request->all();

            $vip->update($attributes);

            return $this->response->message(trans('messages.success.update', ['Module' => 'VIP']))
                ->code(0)
                ->status('success')
                ->url(guard_url('vip/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('vip/'))
                ->redirect();
        }
    }
    public function rebates(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        $searchs = $request->input('search',[]);

        $rebates = app(AccountRebate::class)
            ->Join('AccountsInfo as AI','AI.UserID','=','AccountsRebates.FromUserID')
            ->Join('AccountsInfo as AI2','AI2.UserID','=','AccountsRebates.UserID');
        if ($searchs) {
            foreach ($searchs as $search_key => $search_value)
            {
                if($search_value)
                {
                    if(strstr($search_key,'|'))
                    {
                        $search_key_arr = explode('|',$search_key);
                        $rebates = $rebates->where(function ($rebates) use($search_key_arr,$search_value) {
                            foreach ($search_key_arr as $search_key_val) {
                                $rebates = $rebates->orWhere(function ($rebates) use($search_key_val,$search_value) {
                                    $rebates->where($search_key_val, 'like', '%' . $search_value . '%');
                                });
                            }
                        });
                    }else{
                        $rebates = $rebates->where(function ($rebates) use($search_key,$search_value) {
                            $rebates->where($search_key, 'like', '%' . $search_value . '%');
                        });
                    }
                }
            }
        }
        $rebates = $rebates
            ->orderBy('RebateID','DESC')
            ->select('AccountsRebates.*','AI.Accounts as FromAccounts','AI2.Accounts as Accounts','AI.GameID as FromGameID','AI2.GameID as GameID')
            ->paginate($limit);

        if ($this->response->typeIs('json')) {
            $data = $rebates ? $rebates->toArray()['data'] : [];
            foreach ($data as $key => $val)
            {
                $data[$key]['RebateDetail'] = $val['Rank'] == 1 ? '（一级下线）' : '（二级下线）';
                $data[$key]['RebateDetail'] = $val['FromAccounts'].$data[$key]['RebateDetail'].'('.$val['FromGameID'].')';
                $data[$key]['AccountsDetail'] = $val['Accounts'] .'('.$val['GameID'].')';
            }
            return $this->response
                ->success()
                ->count($rebates->total())
                ->data($data)
                ->output();
        }

        return $this->response->title(trans('app.admin.panel'))
            ->view('vip.rebates', true)
            ->output();
    }
    public function accountsVips(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        $searchs = $request->input('search',[]);
        $accounts_vips = app(AccountVip::class)
            ->Join('AccountsInfo AS AI','AI.UserID','=','AccountsVips.UserID')
            ->Join('Vips','Vips.VipID','=','AccountsVips.VipID');
        if ($searchs) {
            foreach ($searchs as $search_key => $search_value)
            {
                if(strstr($search_key,'|'))
                {
                    $search_key_arr = explode('|',$search_key);
                    $accounts_vips = $accounts_vips->where(function ($accounts_vips) use($search_key_arr,$search_value) {
                        foreach ($search_key_arr as $search_key_val) {
                            $accounts_vips = $accounts_vips->orWhere(function ($accounts_vips) use($search_key_val,$search_value) {
                                $accounts_vips->where($search_key_val, 'like', '%' . $search_value . '%');
                            });
                        }
                    });
                }
            }
        }
        $accounts_vips=$accounts_vips->orderBy('AccountVipID','DESC')
            ->select('AccountsVips.*','AI.Accounts','AI.GameID','Vips.VipName')
            ->paginate($limit);
        if ($this->response->typeIs('json')) {
            $data = $accounts_vips ? $accounts_vips->toArray()['data'] : [];

            return $this->response
                ->success()
                ->count($accounts_vips->total())
                ->data($data)
                ->output();
        }

        return $this->response->title(trans('app.admin.panel'))
            ->view('vip.accounts_vips', true)
            ->output();
    }

}
