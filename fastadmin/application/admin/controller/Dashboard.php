<?php

namespace app\admin\controller;

use app\common\controller\Backend;

/**
 * 控制台
 *
 * @icon fa fa-dashboard
 * @remark 用于展示当前系统中的统计数据、统计报表及重要实时数据
 */
class Dashboard extends Backend
{

    /**
     * 查看
     */
    public function index()
    {
        $seventtime = \fast\Date::unixtime('day', -7);
        $paylist = $createlist = [];
        for ($i = 0; $i < 10; $i++)
        {
            $time1=date("Y-m-d", time());
            $day1=date('Y-m-d',strtotime('-'.($i-1).' day',strtotime($time1)));
            $day2 = date('Y-m-d',strtotime('-'.$i.' day',strtotime($time1)));
            $createlist[$day2] = model('listennote')->where('createtime','<',strtotime($day1))->where('createtime','>',strtotime($day2))->count();
            $paylist[$day2] = model('teachertimetable')->where('createtime','<',strtotime($day1))->where('createtime','>',strtotime($day2))->count();
        }
        $hooks = config('addons.hooks');
        $uploadmode = isset($hooks['upload_config_init']) && $hooks['upload_config_init'] ? implode(',', $hooks['upload_config_init']) : 'local';

        $CheckTotal=model('teachertimetable')->count();


        $time1=date("Y-m-d", time());
        $time2 = date('Y-m-d',strtotime('+1 day',strtotime($time1)));
        $newchecktotal=model('teachertimetable')->where('createtime','>',strtotime($time1))->where('createtime','<',strtotime($time2))->count();

        $listennote=model('listennote')->count();
        $newlistennote=model('listennote')->where('createtime','>',strtotime($time1))->where('createtime','<',strtotime($time2))->count();

        $this->view->assign([
            'checktotal'        => $CheckTotal,
            'newchecktotal'       => $newchecktotal,
            'listennote'       => $listennote,
            'newlistennote' =>  $newlistennote,
            'todayuserlogin'   => 321,
            'todayusersignup'  => 430,
            'todayorder'       => 2324,
            'unsettleorder'    => 132,
            'sevendnu'         => '80%',
            'sevendau'         => '32%',
            'paylist'          => $paylist,
            'createlist'       => $createlist,
            'uploadmode'       => $uploadmode
        ]);

        return $this->view->fetch();
    }

}
