define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'listennote/index',
                    add_url: 'listennote/add',
                    edit_url: 'listennote/edit',
                    del_url: 'listennote/del',
                    multi_url: 'listennote/multi',
                    table: 'listennote',
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
                        {field: 'Semester_text', title: __('Semester'), operate:false},
                        {field: 'T_name', title: __('T_name')},
                        {field: 'T_Department_text', title: __('T_department'), operate:false},
                        {field: 'School_District_text', title: __('School_district'), operate:false},
                        {field: 'Evaluate_text', title: __('Evaluate'), operate:false},
                        {field: 'listen_time', title: __('Listen_time'), formatter: Table.api.formatter.datetime},
                        {field: 'weight', title: __('Weight')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});