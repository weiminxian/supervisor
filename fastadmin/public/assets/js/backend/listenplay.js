define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'listenplay/index',
                    add_url: 'listenplay/add',
                    edit_url: 'listenplay/edit',
                    del_url: 'listenplay/del',
                    multi_url: 'listenplay/multi',
                    table: 'listenplay',
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
                        {field: 'T_number', title: __('T_number')},
                        {field: 'T_name', title: __('T_name')},
                        {field: 'T_Department', title: __('T_department')},
                        {field: 'School_District_text', title: __('School_district'), operate:false},
                        {field: 'E_Number', title: __('E_number')},
                        {field: 'E_Name', title: __('E_name')},
                        {field: 'E_department', title: __('E_department')},
                        {field: 'Group_text', title: __('Group'), operate:false},
                        {field: 'Post_or_TRD', title: __('Post_or_trd')},
                        {field: 'Title_text', title: __('Title'), operate:false},
                        {field: 'Listen_SD_text', title: __('Listen_sd'), operate:false},
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