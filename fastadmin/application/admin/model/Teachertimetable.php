<?php

namespace app\admin\model;

use think\Model;

class Teachertimetable extends Model
{
    // 表名
    protected $name = 'teachertimetable';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [
        'Title_text'
    ];
    

    
    public function getTitleList()
    {
        return ['教授' => __('教授'),'副教授' => __('副教授'),'讲师' => __('讲师'),'高工' => __('高工'),'教授级高工' => __('教授级高工')];
    }     


    public function getTitleTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['Title'];
        $list = $this->getTitleList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
