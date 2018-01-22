<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/1/22 0022
 * Time: 10:02
 */

namespace app\admin\controller;
use app\common\controller\Backend;


class Test extends Backend
{
    public function index()
    {
        $this->view->assign([
            'totaluser'        => 'hello world',
            'sum'               =>$this->sum(80)
        ]);

        return $this->view->fetch();


    }
     private function sum($max)
     {
         $sum=0;
         for($i=0;$i<=$max;$i++)
         {
             $sum+=$i;
         }
         return $sum;
     }

}