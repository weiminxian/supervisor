<?php

namespace app\admin\model;

use think\Model;

class Listenplay extends Model
{
    // 表名
    protected $name = 'listenplay';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [
        'School_District_text',
        'Group_text',
        'Title_text',
        'Listen_SD_text'
    ];
    

    
    public function getSchoolDistrictList()
    {
        return ['成都校区' => __('成都校区'),'德阳校区' => __('德阳校区')];
    }     

    public function getGroupList()
    {
        return ['二组' => __('二组'),'一组' => __('一组')];
    }     

    public function getTitleList()
    {
        return ['教授级高工' => __('教授级高工'),'高工' => __('高工'),'讲师' => __('讲师'),'副教授' => __('副教授'),'教授' => __('教授')];
    }     

    public function getListenSdList()
    {
        return ['成都校区' => __('成都校区'),'德阳校区' => __('德阳校区')];
    }     


    public function getSchoolDistrictTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['School_District'];
        $list = $this->getSchoolDistrictList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getGroupTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['Group'];
        $list = $this->getGroupList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getTitleTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['Title'];
        $list = $this->getTitleList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getListenSdTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['Listen_SD'];
        $list = $this->getListenSdList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
