<?php

namespace App\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class RebateListTransformer extends TransformerAbstract
{
    public function transform(\App\Models\AccountRebate $accountRebate)
    {
        return [
            'id' => $accountRebate->RebateID,
            'Rank' => $accountRebate->Rank,
            'UserID' => $accountRebate->UserID,
            'FromUserID' => $accountRebate->FromUserID,
            'RebateDate' => $accountRebate->RebateDate,
            'Currency' => $accountRebate->Currency,
            'Rebate' => $accountRebate->Rebate,
            'Ratio' => $accountRebate->Ratio,
        ];
    }
}
