<?php

namespace App\Http\Controllers\Wap;

use Route,Auth;
use App\Http\Controllers\Wap\Controller as BaseController;
use App\Http\Response\ResourceResponse;
use App\Traits\Theme\ThemeAndViews;
use App\Traits\RoutesAndGuards;
use App\Models\Vip;
use App\Models\ShareDetailInfo;
use App\Models\Account;
use App\Models\AccountVip;
use Illuminate\Http\Request;

class VipController extends BaseController
{
    use ThemeAndViews,RoutesAndGuards;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:user.web');
        $this->response = app(ResourceResponse::class);
        $this->setTheme();
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $vips = Vip::orderBy('VipID','asc')->get();
        $account_vip = app(Account::class)->userVip();
        return $this->response->title(trans('app.name'))
            ->view('vip.home')
            ->data(compact('vips','account_vip'))
            ->output();
    }

    public function upgrade(Request $request)
    {
        $vip_id = $request->input('vip_id');
        if(!$vip_id)
        {
            return $this->response->message('请选择vip类型')
                ->status("error")
                ->code(1002)
                ->url(url('/vip'))
                ->redirect();
        }
        $vip = Vip::where('VipID',$vip_id)->first();
        if(!$vip)
        {
            return $this->response->message('该vip不存在')
                ->status("error")
                ->code(1002)
                ->url(url('/vip'))
                ->redirect();
        }
        $account_vip = app(Account::class)->userVip();
        if($account_vip)
        {
            if($account_vip->VipID == $vip->VipID)
            {
                return $this->response->message('您已是'.$vip->VipName)
                    ->status("error")
                    ->code(400)
                    ->url(url('/vip'))
                    ->redirect();
            }
            if($account_vip->VipID > $vip->VipID)
            {
                return $this->response->message('不能降级')
                    ->status("error")
                    ->code(400)
                    ->url(url('/vip'))
                    ->redirect();
            }
        }
        $last_share_detail_info = ShareDetailInfo::orderBy('DetailID','desc')->first();
        if(!$last_share_detail_info)
        {
            return $this->response->message('请先充值')
                ->status("error")
                ->code(400)
                ->url(url('/vip'))
                ->redirect();
        }
        $currency = $last_share_detail_info->Currency;
        if($currency < $vip->Price)
        {
            return $this->response->message('需至少充值'.$vip->Price.'元')
                ->status("error")
                ->code(400)
                ->url(url('/vip'))
                ->redirect();
        }
        $insureScore = app(Account::class)->userInsureScore();
        if($insureScore < $vip->Price)
        {
            return $this->response->message('账户不足'.$vip->Price.'元')
                ->status("error")
                ->code(400)
                ->url(url('/vip'))
                ->redirect();
        }

        AccountVip::create([
            'VipID' => $vip->VipID,
            'UserID' => Auth::user()->UserID,
            'UpgradeType' => 'account',
            'UpgradeDate' => date('Y-m-d H:i:s'),
            'DetailID' => $last_share_detail_info->DetailID,
        ]);

        return $this->response->message('恭喜您升级成功！')
            ->status("success")
            ->code(200)
            ->url(url('/vip'))
            ->redirect();
    }

}
