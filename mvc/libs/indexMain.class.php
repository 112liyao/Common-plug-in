<?php
class indexMain{
    function __construct(){
        $this->smarty=new Smarty();
        $this->smarty->setCompileDir("compile");
        $this->smarty->setTemplateDir("template");
        $this->session=new session();
        //是否从主页进入而且已经登陆
        if($this->session->get("user_login")&&!empty(MVC)){
            //如果登录，设置这些属性
            $this->smarty->assign("nickname",$_SESSION["nickname"]);//昵称
            $this->smarty->assign("indexUser",$_SESSION["indexUser"]);
            $this->smarty->assign("uid",$_SESSION["uid"]);//用户id
        }
    }
    /*
     * 跳转
     * */
    function jump($url,$message){
        $this->smarty->assign("url",$url);
        $this->smarty->assign("message",$message);
        $this->smarty->display("admin/message.html");
    }
    /*
     * 检测登陆
     * */
    function checkLogin(){
        if(!($this->session->get("user_login")&&!empty(MVC))){
            $url="index.php?m=index&f=login&a=startLogin";
            $message="请登陆";
            $this->jump($url,$message);
            return false;
        }else{
            return true;
        }
    }
}

