<?php
namespace App\Traits;

trait MaJiangOptionsMap
{
    protected $maJiangOptionsMap = [
//        1 => '房间类型',
//        2 => '局数',
//        3 => '人数',

        'wanfa' => [
            10 => '抢杠',
            11 => '抢杠全包',
            12 => '流局算杠',
            13 => '吃牌',
            14 => '七小对胡',
            15 => '鸡胡',
            18 => '截胡',

            20 => '长毛',
            21 => '包牌',
            22 => '小讨',
            23 => '暗杠可摆',
            24 => '庄家翻倍',
            25 => '带飘',
            26 => '底分',
            27 => '鸡胡点炮',
            28 => '抢明杠',

            30 => '无字牌',
            31 => '七对翻倍',
            32 => '跟庄',
            33 => '杠爆全包',
            34 => '无鬼加倍',
            35 => '节节高',
            36 => '12张落地',

            //40 => '没有房主标示',

            500 => '一炮多响',
        ],

        'gui_pai' => [
            16 => [
                'name' => '花牌类型',
                'options' => [
                    0 => '无鬼补花',
                    35 => '花牌做鬼',
                ],
            ],
            37 => [
                'name' => '鬼牌类型',
                'options' => [
                    1 => '翻鬼',
                    2 => '白板鬼',
                    3 => '双鬼',
                    4 => '无鬼',
                ],
            ],
        ],

        'ma_pai' => [
            17 => '抓马数',
        ]
    ];
}