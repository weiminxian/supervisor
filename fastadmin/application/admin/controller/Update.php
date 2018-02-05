<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Update extends Backend
{
    
    /**
     * Update模型对象
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Update');

    }
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个方法
     * 因此在当前控制器中可不用编写增删改查的代码,如果需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    public function Update()
    {
        //1.接收提交文件的用户
        $title=$_POST['row[title]'];
        $classify=$_POST['row[classify]'];

        //我们这里需要使用到 $_FILES
        /*echo "<pre>";
        print_r($_FILES);
        echo "</pre>";*/

        //其实我们在上传文件时，点击上传后，数据由http协议先发送到apache服务器那边，这里apache服务器已经将上传的文件存放到了服务器下的C:\windows\Temp目录下了。这时我们只需转存到我们需要存放的目录即可。

        //php中自身对上传的文件大小存在限制默认为2M

        //获取文件的大小
        $file_size=$_FILES['myfile']['size'];
        if($file_size>2*1024*1024)
        {
            $this->error("文件过大，不能上传大于20M的文件");
            exit();
        }

        /* $file_type=$_FILES['myfile']['type'];
         echo $file_type;
         if($file_type!="image/jpeg" && $file_type!='image/pjpeg')
         {
             echo "文件类型只能为jpg格式";
             exit();
         }*/


        //判断是否上传成功（是否使用post方式上传）
        if(is_uploaded_file($_FILES['myfile']['tmp_name']))
        {
            //把文件转存到你希望的目录（不要使用copy函数）
            $uploaded_file=$_FILES['myfile']['tmp_name'];

            //我们给每个用户动态的创建一个文件夹
            $user_path=$_SERVER['DOCUMENT_ROOT']."/update/".$title;
            //判断该用户文件夹是否已经有这个文件夹
            if(!file_exists($user_path))
            {
                mkdir($user_path);
            }

            //$move_to_file=$user_path."/".$_FILES['myfile']['name'];
            $file_true_name=$_FILES['myfile']['name'];
            $move_to_file=$user_path."/".time().rand(1,1000).substr($file_true_name,strrpos($file_true_name,"."));
            //echo "$uploaded_file   $move_to_file";

            $path=substr("$move_to_file",15);

            if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file)))
            {
                //echo $_FILES['myfile']['name']."上传成功"," $user_path,<img src=\"$path\" />";
                $this->model->data(['title'=>$title,'classify'=>$classify,'path'=>$path])->save();
                $this->success();

            }
            else
            {
                $this->error();
            }
        }
        else
        {
            $this->error();
        }

    }

}
