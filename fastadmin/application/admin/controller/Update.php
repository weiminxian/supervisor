<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/1/31 0031
 * Time: 09:55
 */

namespace app\admin\controller;
use app\common\controller\Backend;

use app\common\model\Category as CategoryModel;
use fast\Tree;

class Update extends Backend
{
   /* public function index()
    {

        $this->view->assign([
            'totaluser'        => 'hello world'
        ]);

        return $this->view->fetch();

    }*/
    public function Update()
    {
        //1.接收提交文件的用户
        $username=$_POST['username'];
        $fileintro=$_POST['fileintro'];

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
            echo "文件过大，不能上传大于2M的文件";
            exit();
        }

        $file_type=$_FILES['myfile']['type'];
        echo $file_type;
        if($file_type!="image/jpeg" && $file_type!='image/pjpeg')
        {
            echo "文件类型只能为jpg格式";
            exit();
        }


        //判断是否上传成功（是否使用post方式上传）
        if(is_uploaded_file($_FILES['myfile']['tmp_name']))
        {
            //把文件转存到你希望的目录（不要使用copy函数）
            $uploaded_file=$_FILES['myfile']['tmp_name'];

            //我们给每个用户动态的创建一个文件夹
            $user_path=$_SERVER['DOCUMENT_ROOT']."/update/".$username;
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
                echo $_FILES['myfile']['name']."上传成功"," $user_path,<img src=\"$path\" />";
            }
            else
            {
                echo "上传失败";
            }
        }
        else
        {
            echo "上传失败";
        }

    }

    protected $model = null;
    protected $categorylist = [];
    protected $noNeedRight = ['selectpage'];

    public function _initialize()
    {
        parent::_initialize();
        $this->request->filter(['strip_tags']);
        $this->model = model('Category');

        $tree = Tree::instance();
        $tree->init(collection($this->model->order('weigh desc,id desc')->select())->toArray(), 'pid');
        $this->categorylist = $tree->getTreeList($tree->getTreeArray(0), 'name');
        $categorydata = [0 => ['type' => 'all', 'name' => __('None')]];
        foreach ($this->categorylist as $k => $v)
        {
            $categorydata[$v['id']] = $v;
        }
        $this->view->assign("flagList", $this->model->getFlagList());
        $this->view->assign("typeList", CategoryModel::getTypeList());
        $this->view->assign("parentList", $categorydata);
    }

    /**
     * 查看
     */
    public function index()
    {
        if ($this->request->isAjax())
        {
            $search = $this->request->request("search");
            //构造父类select列表选项数据
            $list = [];
            if ($search)
            {
                foreach ($this->categorylist as $k => $v)
                {
                    if (stripos($v['name'], $search) !== false || stripos($v['nickname'], $search) !== false)
                    {
                        $list[] = $v;
                    }
                }
            }
            else
            {
                $list = $this->categorylist;
            }
            $total = count($list);
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }

    /**
     * Selectpage搜索
     *
     * @internal
     */
    public function selectpage()
    {
        return parent::selectpage();
    }

}