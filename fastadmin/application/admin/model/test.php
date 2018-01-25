<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/1/25 0025
 * Time: 10:06
 */

namespace app\admin\model;
use think\Model;


class test extends Model
{
    public function gettest()
    {
       $ss= $this->table('fa_test')->where('id',1)->find();
        return $ss;
    }

}