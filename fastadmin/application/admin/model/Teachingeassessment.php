<?php

namespace app\admin\model;

use think\Model;

class Teachingeassessment extends Model
{
    // 表名
    protected $name = 'teachingeassessment';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [
        'Evaluate_Semester_text',
        'T_Department_text',
        'T_title_text'
    ];
    

    
    public function getEvaluateSemesterList()
    {
        return ['2029-2030-2' => __('2029-2030-2'),'2029-2030-1' => __('2029-2030-1'),'2028-2029-2' => __('2028-2029-2'),'2028-2029-1' => __('2028-2029-1'),'2027-2028-2' => __('2027-2028-2'),'2027-2028-1' => __('2027-2028-1'),'2026-2027-2' => __('2026-2027-2'),'2026-2027-1' => __('2026-2027-1'),'2025-2026-2' => __('2025-2026-2'),'2025-2026-1' => __('2025-2026-1'),'2024-2025-2' => __('2024-2025-2'),'2024-2025-1' => __('2024-2025-1'),'2023-2024-2' => __('2023-2024-2'),'2023-2024-1' => __('2023-2024-1'),'2022-2023-2' => __('2022-2023-2'),'2021-2022-2' => __('2021-2022-2'),'2021-2022-1' => __('2021-2022-1'),'2020-2021-2' => __('2020-2021-2'),'2020-2021-1' => __('2020-2021-1'),'2019-2020-2' => __('2019-2020-2'),'2019-2020-1' => __('2019-2020-1'),'2018-2019-2' => __('2018-2019-2'),'2018-2019-1' => __('2018-2019-1'),'2017-2018-2' => __('2017-2018-2'),'2017-2018-1' => __('2017-2018-1')];
    }     

    public function getTDepartmentList()
    {
        return ['体育教学部' => __('体育教学部'),'铁道工程系' => __('铁道工程系'),'风景园林系' => __('风景园林系'),'公共管理系' => __('公共管理系'),'设备工程系' => __('设备工程系'),'交通与市政工程系' => __('交通与市政工程系'),'材料工程系' => __('材料工程系'),'工程管理系' => __('工程管理系'),'继续教育学院' => __('继续教育学院'),'思想政治理论课教学部' => __('思想政治理论课教学部'),'电气工程系' => __('电气工程系'),'测绘工程系' => __('测绘工程系'),'国际技术教育学院' => __('国际技术教育学院'),'信息工程系' => __('信息工程系'),'机械工程系' => __('机械工程系'),'建筑与艺术系' => __('建筑与艺术系'),'经济管理系' => __('经济管理系'),'土木工程系' => __('土木工程系')];
    }     

    public function getTTitleList()
    {
        return ['高级' => __('高级'),'中级' => __('中级'),'初级' => __('初级')];
    }     


    public function getEvaluateSemesterTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['Evaluate_Semester'];
        $list = $this->getEvaluateSemesterList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getTDepartmentTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['T_Department'];
        $list = $this->getTDepartmentList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getTTitleTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['T_title'];
        $list = $this->getTTitleList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
