define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'teachingeassessment/index',
                    add_url: 'teachingeassessment/add',
                    edit_url: 'teachingeassessment/edit',
                    del_url: 'teachingeassessment/del',
                    multi_url: 'teachingeassessment/multi',
                    table: 'teachingeassessment',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'Number',
                sortName: 'Number',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'Number', title: __('Number')},
                        {field: 'Evaluate_Semester_text', title: __('Evaluate_semester'), operate:false},
                        {field: 'T_Department_text', title: __('T_department'), operate:false},
                        {field: 'T_number', title: __('T_number')},
                        {field: 'T_name', title: __('T_name')},
                        {field: 'T_title_text', title: __('T_title'), operate:false},
                        {field: 'Leadership_score', title: __('Leadership_score')},
                        {field: 'TRD_score', title: __('Trd_score')},
                        {field: 'Stu_score', title: __('Stu_score')},
                        {field: 'Export_score', title: __('Export_score')},
                        {field: 'Deans_Office_score', title: __('Deans_office_score')},
                        {field: 'Sum_score', title: __('Sum_score')},
                        {field: 'weight', title: __('Weight')},
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
     /*   add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },*/
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});