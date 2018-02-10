<?php

namespace app\admin\model;

use think\Model;

class Listennote extends Model
{
    // 表名
    protected $name = 'listennote';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [
        'Semester_text',
        'T_Department_text',
        'School_District_text',
        'Evaluate_text',
        'listen_time_text'
    ];
    

    
    public function getSemesterList()
    {
        return ['2029-2030-2' => __('2029-2030-2'),'2029-2030-1' => __('2029-2030-1'),'2028-2029-2' => __('2028-2029-2'),'2028-2029-1' => __('2028-2029-1'),'2027-2028-2' => __('2027-2028-2'),'2027-2028-1' => __('2027-2028-1'),'2026-2027-2' => __('2026-2027-2'),'2026-2027-1' => __('2026-2027-1'),'2025-2026-2' => __('2025-2026-2'),'2025-2026-1' => __('2025-2026-1'),'2024-2025-2' => __('2024-2025-2'),'2024-2025-1' => __('2024-2025-1'),'2023-2024-2' => __('2023-2024-2'),'2023-2024-1' => __('2023-2024-1'),'2022-2023-2' => __('2022-2023-2'),'2022-2023-1' => __('2022-2023-1'),'2021-2022-2' => __('2021-2022-2'),'2021-2022-1' => __('2021-2022-1'),'2020-2021-2' => __('2020-2021-2'),'2020-2021-1' => __('2020-2021-1'),'2019-2020-2' => __('2019-2020-2'),'2019-2020-1' => __('2019-2020-1'),'2018-2019-2' => __('2018-2019-2'),'2018-2019-1' => __('2018-2019-1'),'2017-2018-2' => __('2017-2018-2'),'2017-2018-1' => __('2017-2018-1')];
    }     

    public function getTDepartmentList()
    {
        return ['土木工程系' => __('土木工程系'),'工程管理系' => __('工程管理系'),'经济管理系' => __('经济管理系'),'材料工程系' => __('材料工程系'),'建筑与艺术系' => __('建筑与艺术系'),'交通与市政工程系' => __('交通与市政工程系'),'机械工程系' => __('机械工程系'),'设备工程系' => __('设备工程系'),'信息工程系' => __('信息工程系'),'公共管理系' => __('公共管理系'),'国际技术教育学院' => __('国际技术教育学院'),'风景园林系' => __('风景园林系'),'测绘工程系' => __('测绘工程系'),'电气工程系' => __('电气工程系'),'铁道工程系' => __('铁道工程系'),'思想政治理论课教学部' => __('思想政治理论课教学部'),'体育教学部' => __('体育教学部'),'继续教育学院' => __('继续教育学院')];
    }     

    public function getSchoolDistrictList()
    {
        return ['成都校区' => __('成都校区'),'德阳校区' => __('德阳校区')];
    }     

    public function getEvaluateList()
    {
        return ['差' => __('差'),'中' => __('中'),'良' => __('良'),'优' => __('优')];
    }     


    public function getSemesterTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['Semester'];
        $list = $this->getSemesterList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getTDepartmentTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['T_Department'];
        $list = $this->getTDepartmentList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getSchoolDistrictTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['School_District'];
        $list = $this->getSchoolDistrictList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getEvaluateTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['Evaluate'];
        $list = $this->getEvaluateList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getListenTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['listen_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setListenTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }


}
