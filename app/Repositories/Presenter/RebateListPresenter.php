<?php

namespace App\Repositories\Presenter;

use App\Repositories\Presenter\FractalPresenter;

class RebateListPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \App\Repositories\Eloquent\RebateListTransformer
     */
    public function getTransformer()
    {
        return new RebateListTransformer();
    }
}
