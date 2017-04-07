<?php
class index extends main{
    //后台登录检测
    function init(){
        if(!isset($_SESSION["is_login"])){
            $this->smarty->display("admin/login.html");
        }else{
            $url="index.php?m=admin&a=main";
            $message="已经登录";
            $this->jump($url,$message);
            exit;
        }
    }
    //生成后台管理员
    function guanli(){
        $pass=md5(123123);
        $db=new db("gs_admin");
         echo $db->insert("aname='admin';apass='$pass'");

    }
    //后台登录检测
    function main(){
        if(!$this->checkLogin()){
            $this->smarty->display("admin/login.html");
        }else{
            $this->smarty->assign("username",$_SESSION["aname"]);
            $this->smarty->assign("atype",$_SESSION["atype"]);
            $this->smarty->display("admin/index.html");
        }
    }
    /*
     * 后台登录
     * */
    function onLogin(){
        $db=new db('gs_admin');
        $username=P("username");
        $password=md5(P("password"));
        $result=$db->select();
        foreach ($result as $k=>$v) {
            if($v['aname']==$username){
                if($v['apass']==$password){
                    $this->session->set("is_login",'yes');
                    $this->session->set("aname",$username);
                    $this->session->set("aid",$v['aid']);
                    $this->session->set("atype",$v['type']);
                    $message="登录成功";
                    $url="index.php?m=admin&a=main";
                    $this->jump($url,$message);
                    return true;
                    exit;
                }
            }
        }
        $message="登录失败";
        $url="index.php?m=admin";
        $this->jump($url,$message);
        return false;
    }
    //验证码
    function code(){
        $image=new code();
        $image->letterUrl="static/font/FZBSFW.TTF";
        $image->output();
        $_SESSION["code"]=$image->resultLetter;
    }
    /*
     * 检测验证码
     * */
    function checkCode(){
        $code=$_GET["code"];
        $code=strtolower($code);
        if($_SESSION["code"]==$code){
            echo "ok";
        }else{
            echo "验证码输入不正确";
        }
    }
    /*
     * 后台退出登录
     * */
    function unLogin(){
        $this->session->clear();
        $url="index.php?m=admin";
        $message="退出登录成功";
        $this->jump($url,$message);
    }
    /************登录结束**************/
    //*****************************新加的***********************************************
    //跳转所有用户管理员界面
    function guanliauser(){
        $db=new db("gs_admin");
        $result=$db->select();
        $result=JSON_encode($result);
        $this->smarty->assign('result',$result);
        $jiance="/^[a-z||A-Z]\w{5,9}$/";
        $this->smarty->assign('jiance',$jiance);
        $this->smarty->display("admin/guanliauser.html");
    }
    //提交添加分类
    function addauser (){
        $aname=P("aname");
        $apass=P("apass");
        $apass=md5($apass);
        $db=new db("gs_admin");
        //判断重名
        $result=$db->select();
        for($i=0;$i<count($result);$i++){
            if($result[$i]["aname"]==$aname){
                $this->jump("index.php?m=admin&&a=guanliauser","账号已经存在");
                exit();
            }
        }
        $result=$db->insert("insert into gs_admin (aname,apass) VALUES ('".$aname."','".$apass."')");
        if($result==1){
            $this->jump("index.php?m=admin&&a=guanliauser","恭喜您！添加成功");
        }else{
            $this->jump("index.php?m=admin&&a=guanliauser","对不起！添加失败");
        }
    }
    //点击删除auser
    function delauser(){
        $aid=P("aid");
        $db=new db("gs_admin");
        $result=$db->where("aid=".$aid)->delete();
        if($result==1){
            $this->jump("index.php?m=admin&&a=guanliauser","恭喜您！删除成功");
        }else{
            $this->jump("index.php?m=admin&&a=guanliauser","对不起！删除失败");
        }
    }
    //跳转修改密码页面
    function editapass(){
        $aid=$this->session->get("aid");
        $this->smarty->assign('aid',$aid);
        $jiance="/^[a-z||A-Z]\w{5,9}$/";
        $this->smarty->assign('jiance',$jiance);
        $this->smarty->display("admin/editapass.html");
    }
    //提交修改密码信息
    function editapassinfo(){
        $aid=P("aid");
        $oldapass=P("oldapass");
        $newapass=P("newapass");
        $oldapass=md5($oldapass);
        $newapass=md5($newapass);
        $db=new db("gs_admin");
        //查询旧密码是否一致
        $result=$db->select();
        for($i=0;$i<count($result);$i++){
            if($result[$i]["aid"]==$aid){
                if($result[$i]["apass"]==$oldapass){
                    if($db->update("update gs_admin set apass='".$newapass."' where aid=".$aid)==1){
                        $this->jump("index.php?m=admin&&a=editapass","修改成功");
                        exit();
                    }
                }else{
                    $this->jump("index.php?m=admin&&a=editapass","旧密码错误");
                    exit();
                }
            }
        }
    }
    //跳转评论管理页面
    function pinglunguanli(){
        $db1=new db("gs_course_msg");
        $db2=new db("gs_news_msg");
        $result1=$db1->select();
        $result2=$db2->select();
        $result1=JSON_encode($result1);
        $result2=JSON_encode($result2);
        $this->smarty->assign('result1',$result1);
        $this->smarty->assign('result2',$result2);
        $this->smarty->display("admin/pinglunguanli.html");
    }
    //点击删除评论
    function delpinglun(){
        $mid=P("mid");
        $biao=P("biao");
        if($biao==1){
            $db=new db("gs_course_msg");
            $result=$db->where("mid=".$mid)->delete();
        }else if($biao==2){
            $db=new db("gs_news_msg");
            $result=$db->where("mid=".$mid)->delete();
        }
        $dbgood=new db("gs_course_msg");
        $dbgood->where("mid=".$mid)->delete();
        if($result==1){
            $this->jump("index.php?m=admin&&a=pinglunguanli","恭喜您！删除成功");
        }else{
            $this->jump("index.php?m=admin&&a=pinglunguanli","对不起！删除失败");
        }
    }
    //评论搜索
    function pinglunsousuo(){
        $guanjianzi=P("guanjianzi");
        $db1=new db("gs_course_msg");
        $db2=new db("gs_news_msg");
        $result1=$db1->select("select * from gs_course_msg where mcon like '%".$guanjianzi."%'");
        $result2=$db2->select("select * from gs_news_msg where mcon like '%".$guanjianzi."%'");
//  	var_dump($result1);
//  	var_dump($result2);
        $result1=JSON_encode($result1);
        $result2=JSON_encode($result2);
        $this->smarty->assign('result1',$result1);
        $this->smarty->assign('result2',$result2);
        $this->smarty->display("admin/pinglunguanli.html");
    }
    /**************修改密码和评论**************/
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
        $this->selectdel($cid,"gs_news");
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