<?php
class index extends main {
    function init(){
        $this->smarty->display("admin/index.html");
    }
    //跳转修改管理员密码页面
    function editauser(){
        $this->smarty->display("admin/editauser.html");
    }
    //跳转删除用户页面
    function deluser(){
        $db=new db("gs_user");
        $result=$db->select();
        $result=JSON_encode($result);
        $this->smarty->assign('result',$result);
        $this->smarty->display("admin/deluser.html");
    }
    //删除用户操作
    function shanchuuser(){
        $id=P("id");
        $db=new db("gs_user");
        $result=$db->where("uid=".$id)->delete();
        if($result==1){
            $this->jump("index.php?m=admin&&a=deluser","恭喜您！删除成功");
        }else{
            $this->jump("index.php?m=admin&&a=deluser","对不起！删除失败");
        }
    }

    //跳转添加分类页面
    function addcategory(){
        $db=new db("gs_category");
        $result=$db->select();
        $result=JSON_encode($result);
//		$this->smarty->assign('result',$result);
        $this->smarty->assign('result',$result);
        $this->smarty->display("admin/addcategory.html");
    }
    //提交添加分类
    function addcategoryinfo (){
        $pid=P("pid");
        $cname=P("cname");
        $db=new db("gs_category");
        $result=$db->insert("insert into gs_category (cname,pid) VALUES ('".$cname."','".$pid."')");
        if($result==1){
            $this->jump("index.php?m=admin&&a=addcategory","恭喜您！添加成功");
        }else{
            $this->jump("index.php?m=admin&&a=addcategory","对不起！添加失败");
        }
    }
    //管理分类
    function guanlicategory(){
        $db=new db("category");
        $result=$db->select();
//  	$result=JSON_encode($result);
//		$this->smarty->assign('result',$result);
        $this->smarty->assign('result',$result);
        $this->smarty->display("admin/guanlicategory.html");
    }

    //查询show表是否有 被删除标题的文章
    function selectdel($cid,$biaoming){
        $dbshows=new db($biaoming);
        $res=$dbshows->select();
        for($i=0;$i<count($res);$i++){
            if($cid==$res[$i]["cid"]){
                $this->jump("index.php?m=admin&&a=addcategory","请先删除该分类中的文章");
                exit();
            }
        }
    }
    //删除分类
    function delcategory(){
        $cid=P("cid");
        //判断有没有子标题
        $dbshows=new db("gs_category");
        $res=$dbshows->select();
        for($i=0;$i<count($res);$i++){
            if($cid==$res[$i]["pid"]){
                $this->jump("index.php?m=admin&&a=addcategory","请先删除该分类的子分类");
                exit();
            }
        }
        $this->selectdel($cid,"gs_course");
        $this->selectdel($cid,"gs_news");
        $this->selectdel($cid,"gs_stuwork");
        //满足条件执行删除语句
        $db=new db("gs_category");
        $result=$db->where("cid=".$cid)->delete();
        if($result==1){
            $this->jump("index.php?m=admin&&a=addcategory","恭喜您！删除成功");
        }else{
            $this->jump("index.php?m=admin&&a=addcategory","对不起！删除失败");
        }
    }
    //修改分类
    function deitcategoryinfo(){
        $cid=P("cid");
        $cname=P("cname");
        $db=new db("gs_category");
        $result=$db->update("update gs_category set cname='".$cname."' where cid=".$cid);
        if($result==1){
            $this->jump("index.php?m=admin&&a=addcategory","恭喜您！修改成功");
        }else{
            $this->jump("index.php?m=admin&&a=addcategory","对不起！修改失败");
        }
    }
}