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
                        {field: 'TNumber', title: __('Tnumber')},
                        {field: 'TName', title: __('Tname')},
                        {field: 'TDepartment', title: __('Tdepartment')},
                        {field: 'SchoolDistrict_text', title: __('Schooldistrict'), operate:false},
                        {field: 'ENumber', title: __('Enumber')},
                        {field: 'EName', title: __('Ename')},
                        {field: 'Edepartment', title: __('Edepartment')},
                        {field: 'Group_text', title: __('Group'), operate:false},
                        {field: 'PostOrTRD', title: __('Postortrd')},
                        {field: 'Title_text', title: __('Title'), operate:false},
                        {field: 'ListenSD_text', title: __('Listensd'), operate:false},
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