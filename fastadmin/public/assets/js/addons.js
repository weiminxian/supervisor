define([], function () {
    require(['form', 'upload'], function (Form, Upload) {
    var _bindevent = Form.events.bindevent;
    Form.events.bindevent = function (form) {
        _bindevent.apply(this, [form]);
        try {
            //绑定自定义属性组件
            if ($("textarea[id$=Properties]", form).size() > 0) {
                require(['../addons/properties/Properties'], function (Properties){
                    var obj=$("textarea[id$=Properties]", form);

            　　　　var table=Properties.init(obj);

                    $(form).on("click",".property_add",function(event){
                        Properties.create(table);
                    })

                    $(form).on("click",".property_del",function(event){
                        Properties.remove(table,$(this).parents("tr").data("index"));
                    })

                    $(form).on("click",".property_drag",function(event){
                        Properties.sort(table,$(this).data("index"),$(this).data("direction"));
                    })

                    $(form).on("change","input",function(event){
                        Properties.set(table,$(this).parents("tr").data("index"));
                    })


                    
            　　});
            }
        } catch (e) {

        }

    };
});

//修改上传的接口调用
require(['upload'], function (Upload) {
    var _FileUploaded = Upload.events.FileUploaded;
    Upload.events.FileUploaded = function (up, file, info) {
        //因为不同上传所返回的数据格式不同，你可以在这里进行处理
        _FileUploaded.apply(this, [up, file, info]);
    };
});
});