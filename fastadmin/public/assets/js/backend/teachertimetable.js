define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'teachertimetable/index',
                    add_url: 'teachertimetable/add',
                    edit_url: 'teachertimetable/edit',
                    del_url: 'teachertimetable/del',
                    multi_url: 'teachertimetable/multi',
                    table: 'teachertimetable',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'Place', title: __('Place')},
                        {field: 'Curriculum', title: __('Curriculum')},
                        {field: 'Teacher', title: __('Teacher')},
                        {field: 'Title_text', title: __('Title'), operate:false},
                        {field: 'Class_number', title: __('Class_number')},
                        {field: 'Class_Name', title: __('Class_name')},
                        {field: 'Relly_Number_People', title: __('Relly_number_people')},
                        {field: 'Class_Composition', title: __('Class_composition')},
                        {field: 'Section', title: __('Section')},
                        {field: 'Check_Record', title: __('Check_record')},
                        {field: 'Verification', title: __('verification')},
                        {field: 'weight', title: __('Weight')},
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
       /* add: function () {
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