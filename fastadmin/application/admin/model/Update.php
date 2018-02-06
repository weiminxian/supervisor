<?php

namespace app\admin\model;

use think\Model;

class Update extends Model
{
    // 表名
    protected $name = 'update';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [
        'classify_text'
    ];
    

    protected static function init()
    {
        self::afterInsert(function ($row) {
            $pk = $row->getPk();
            $row->getQuery()->where($pk, $row[$pk])->update(['weigh' => $row[$pk]]);
        });
    }

    
    public function getClassifyList()
    {
        return ['整改专栏' => __('整改专栏'),'质控快讯' => __('质控快讯'),'教学督导' => __('教学督导'),'质量管理体系' => __('质量管理体系'),'管理规定' => __('管理规定'),'部门概况' => __('部门概况')];
    }     


    public function getClassifyTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['classify'];
        $list = $this->getClassifyList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
