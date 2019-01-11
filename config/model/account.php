<?php

return [
    /*
     * Package.
     */
    'package'  => 'account',

    /*
     * Modules.
     */
    'modules'  => ['account','account_vip','t_acc_dealset','game_score_info'],

    'account'     => [
        'model' => [
            'model'         => \App\Models\Account::class,
            'table'         => 'AccountsInfo',
            //'presenter'     => \Litepie\User\Repositories\Presenter\UserPresenter::class,
            'hidden'        => [],
            'visible'       => [],
            'guarded'       => ['*'],
            'slugs'         => [],
            'appends'       => [],
            'fillable'      => [''],
            'translate'     => [],
            'upload_folder' => 'user/user',
            'uploads'       => [
                'photo' => [
                    'count' => 1,
                    'type'  => 'image',
                ],
            ],
            'casts'         => [
                'permissions' => 'array',
                'photo'       => 'array',
                'dob'         => 'date',
            ],
            'revision'      => [],
            'perPage'       => '20',
            'search'        => [

            ],
        ],

    ],
    'account_vip'     => [
        'model' => [
            'model'         => \App\Models\AccountVip::class,
            'table'         => 'AccountsVips',
            //'presenter'     => \Litepie\User\Repositories\Presenter\UserPresenter::class,
            'hidden'        => [],
            'visible'       => [],
            'guarded'       => ['*'],
            'slugs'         => [],
            'appends'       => [],
            'fillable'      => ['VipID','UserID','UpgradeType','UpgradeDate','Price'],
            'translate'     => [],
            'upload_folder' => 'user/user',
            'uploads'       => [
                'photo' => [
                    'count' => 1,
                    'type'  => 'image',
                ],
            ],
            'casts'         => [
                'permissions' => 'array',
                'photo'       => 'array',
                'dob'         => 'date',
            ],
            'revision'      => [],
            'perPage'       => '20',
            'search'        => [

            ],
        ],

    ],
    't_acc_dealset'     => [
        'model' => [
            'model'        => 'App\Models\TAccDealSet',
            'table'        => 'T_Acc_DealSet',
            'primaryKey'   => 'ID',
            'hidden'       => [],
            'visible'      => [],
            'guarded'      => ['*'],
            'fillable'     => [],
            'translate'    => [],
            'upload_folder' => '/page/link',
            'encrypt'      => ['id'],
            'revision'     => ['name'],
            'perPage'      => '20',
            'search'        => [
                'title'  => 'like',
            ],
        ],
    ],
    'game_score_info'     => [
        'model' => [
            'model'        => 'App\Models\GameScoreInfo',
            'table'        => 'GameScoreInfo',
            //'primaryKey'   => 'id',
            'hidden'       => [],
            'visible'      => [],
            'guarded'      => ['*'],
            'fillable'     => [],
            'translate'    => [],
            'upload_folder' => '/page/link',
            'encrypt'      => ['id'],
            'revision'     => ['name'],
            'perPage'      => '20',
            'search'        => [
                'title'  => 'like',
            ],
        ],
    ],
    'share_detail_info'=> [
        'model' => [
            'model'        => 'App\Models\ShareDetailInfo',
            'table'        => 'ShareDetailInfo',
            'primaryKey'   => 'DetailID',
            'hidden'       => [],
            'visible'      => [],
            'guarded'      => ['*'],
            'fillable'     => [],
            'translate'    => [],
            'upload_folder' => '/page/link',
            //'encrypt'      => ['id'],
            'revision'     => ['name'],
            'perPage'      => '20',
            'search'        => [
                'title'  => 'like',
            ],
        ],
    ],
    'account_rebate'     => [
        'model' => [
            'model'         => \App\Models\AccountRebate::class,
            'table'         => 'AccountsRebates',
            'primaryKey'    => 'RebateID',
            //'presenter'     => \Litepie\User\Repositories\Presenter\UserPresenter::class,
            'hidden'        => [],
            'visible'       => [],
            'guarded'       => ['*'],
            'slugs'         => [],
            'appends'       => [],
            'fillable'      => [],
            'translate'     => [],
            'upload_folder' => 'user/user',
            'uploads'       => [
                'photo' => [
                    'count' => 1,
                    'type'  => 'image',
                ],
            ],
            'casts'         => [
                'permissions' => 'array',
                'photo'       => 'array',
                'dob'         => 'date',
            ],
            'revision'      => [],
            'perPage'       => '20',
            'search'        => [

            ],
        ],

    ],
    't_off_line_order'  => [
        'model' => [
            'model'         => \App\Models\TOffLineOrder::class,
            'table'         => 'T_OffLineOrder',
            'primaryKey'    => 'ID',
            //'presenter'     => \Litepie\User\Repositories\Presenter\UserPresenter::class,
            'hidden'        => [],
            'visible'       => [],
            'guarded'       => ['*'],
            'slugs'         => [],
            'appends'       => [],
            'fillable'      => [],
            'translate'     => [],
            'upload_folder' => 'user/user',
            'uploads'       => [
                'photo' => [
                    'count' => 1,
                    'type'  => 'image',
                ],
            ],
            'casts'         => [
                'permissions' => 'array',
                'photo'       => 'array',
                'dob'         => 'date',
            ],
            'revision'      => [],
            'perPage'       => '20',
            'search'        => [

            ],
        ],

    ],
    'vip_rebate'  => [
        'model' => [
            'model'         => \App\Models\VipRebate::class,
            'table'         => 'VipRebates',
            'primaryKey'    => 'VipRebateID',
            //'presenter'     => \Litepie\User\Repositories\Presenter\UserPresenter::class,
            'hidden'        => [],
            'visible'       => [],
            'guarded'       => ['*'],
            'slugs'         => [],
            'appends'       => [],
            'fillable'      => ['VipID','Rank','Ratio'],
            'translate'     => [],
            'upload_folder' => 'user/user',
            'uploads'       => [
                'photo' => [
                    'count' => 1,
                    'type'  => 'image',
                ],
            ],
            'casts'         => [
                'permissions' => 'array',
                'photo'       => 'array',
                'dob'         => 'date',
            ],
            'revision'      => [],
            'perPage'       => '20',
            'search'        => [

            ],
        ],

    ],
];
