<?php
class art extends main{
    function __construct()
    {
        parent::__construct();
        $this->db=new db("gs_notice");
    }

    // 跳转到添加公告文章页面
    function addnotice(){
        $this->smarty->display("admin/addnotice.html");
    }

    // 添加的公告文章内容放入数据库的函数
    function addnoticeInfo(){
        $ntitle=P("ntitle");  //文章标题
        $nname=P("nname");  //发布人
        $nsummary=P("nsummary");  //摘要
        $ncon=P("editor_id");  //内容


        if(empty($nname)){
            $nname="山西工商学院";
        }

        $nsummary=str_ireplace(" ","",$nsummary);
        if(empty($nsummary)){
            $nsummary=$ntitle;
        }

        $result=$this->db->insert("insert into gs_notice (ntitle,nname,nsummary,ncon) values ('$ntitle','$nname','$nsummary','$ncon')");


        if($result>0){
            echo "添加成功";
        }else{
            echo "添加失败";
        }


    }

    //  搜索出公告内容。并将信息传入管理页
    function shownotice(){
        $result=$this->db->select();
//        $result=$this->db->order("time desc")->limit("0,6")->select();

        /*
         * 标题 ntitle
         * 内容 ncon
         * 时间 ntime
         * 发布人 nname
         * 摘要 nsummary
         * */
        $this->smarty->assign("notice",$result);
        $this->smarty->display("admin/shownotice.html");
    }

    // 跳转到删除公告文章页面
    function delnotice(){
        $nid=P("nid");

        $result=$this->db->delete("nid=$nid");
        if($result>0){
            echo "删除成功";
        }else{
            var_dump($result);
            echo "删除失败";
        }
    }

    // 跳转到添加新闻页面
    function addnews(){
        $db=new db("gs_category");

        $tree=new trees();
        $tree->tree(0,0,"gs_category",$db);

        $this->smarty->assign("tree",$tree->str);
        $this->smarty->display("admin/addnews.html");
    }

    // 讲添加新闻页提交的数据放入数据库
    function addnewsInfo(){

        $db=new db("gs_news");

        $title=P("title");  //文章标题
        $etitle=P("etitle");  //文章标题
        $cid=P("cid");  //分类id
        $name=P("name");  //发布人
        $summary=P("summary");  //摘要
        $con=P("editor_id");  //内容


        if(empty($name)){
            $name="山西工商学院";
        }

        $summary=str_ireplace(" ","",$summary);
        if(empty($summary)){
            $summary=$title;
        }

        $result=$db->insert("insert into gs_news (title,etitle,name,summary,con,cid) values ('$title','$etitle','$name','$summary','$con',$cid)");

        if($result>0){
            echo "添加成功";
        }else{
            echo "添加失败";
        }
    }

    //  搜索出新闻内容。并将信息传入管理页
    function shownews(){
        $db=new db("gs_news");
        $result=$db->select();

        /*
         * 标题 title
         * 内容 con
         * 时间 ntime
         * 发布人 name
         * 摘要 summary
         * 点击量 hits
         * */
        $this->smarty->assign("news",$result);
        $this->smarty->display("admin/shownews.html");
    }

    // 删除新闻
    function delnews(){

        $db=new db("gs_news");
        $nid=P("nid");

        $result=$db->delete("nid=$nid");
        if($result>0){
            echo "删除成功";
        }else{
            var_dump($result);
            echo "删除失败";
        }
    }

    // 跳转到学生新闻添加页
    function addstuwork(){
        $db=new db("gs_category");

        $tree=new trees();
        $tree->tree(0,0,"gs_category",$db);

        $this->smarty->assign("tree",$tree->str);
        $this->smarty->display("admin/addstuwork.html");
    }

    // 将学生新闻提交到数据库中
    function addstuworkInfo(){

        $db=new db("gs_stuwork");

        $title=P("title");  //文章标题
        $etitle=P("etitle");  //文章标题
        $cid=P("cid");  //分类id
        $name=P("name");  //发布人
        $summary=P("summary");  //摘要
        $con=P("editor_id");  //内容


        if(empty($name)){
            $name="山西工商学院";
        }

        $summary=str_ireplace(" ","",$summary);
        if(empty($summary)){
            $summary=$title;
        }


        $result=$db->insert("insert into gs_stuwork (title,etitle,name,summary,con,cid) values ('$title','$etitle','$name','$summary','$con',$cid)");

        if($result>0){
            echo "添加成功";
        }else{
            echo "添加失败";
        }
    }

    //  搜索出学生新闻内容。并将信息传入管理页
    function showstuwork(){
        $db=new db("gs_stuwork");
        //查询出有分类的新闻
        $result=$db->select("select * from gs_stuwork,gs_category where gs_stuwork.cid=gs_category.cid");
        //查询出无分类的新闻
        $result2=$db->select("select * from gs_stuwork where cid=0");
        /*
         * 标题 title
         * 英文标题 etitle
         * 时间 time
         * 发布人 name
         * 摘要 summary
         * 点击量 hits
         * */
        $this->smarty->assign("nocat_stuwork",$result2);
        $this->smarty->assign("stuwork",$result);
        $this->smarty->display("admin/showstuwork.html");
    }


    // 删除学生新闻
    function delstuwork(){

        $db=new db("gs_stuwork");
        $stid=P("stid");

        $result=$db->delete("stid=$stid");
        if($result>0){
            echo "删除成功";
        }else{
//            var_dump($result);
            echo "删除失败";
        }
    }

    // 跳转到精品课程添加页
    function addcourse(){
        $db=new db("gs_category");

        $tree=new trees();
        $tree->tree(0,0,"gs_category",$db);

        $this->smarty->assign("tree",$tree->str);
        $this->smarty->display("admin/addcourse.html");
    }

    // 将精品课程提交到数据库中
    function addcourseInfo(){

        $db=new db("gs_course");

        $title=P("title");  //文章标题
        $etitle=P("etitle");  //文章标题
        $cid=P("cid");  //分类id
        $name=P("name");  //发布人
        $summary=P("summary");  //摘要
        $con=P("editor_id");  //内容


        if(empty($name)){
            $name="山西工商学院";
        }

        $summary=str_ireplace(" ","",$summary);
        if(empty($summary)){
            $summary=$title;
        }


        $result=$db->insert("insert into gs_course (title,etitle,name,summary,con,cid) values ('$title','$etitle','$name','$summary','$con',$cid)");

        if($result>0){
            echo "添加成功";
        }else{
            echo "添加失败";
        }
    }

    //  搜索出学生新闻内容。并将信息传入管理页
    function showcourse(){
        $db=new db("gs_course");
        // 查询出有分类的新闻
        $result=$db->select("select * from gs_course,gs_category where gs_course.cid=gs_category.cid");
        // 查询出无分类的新闻
        $result2=$db->select("select * from gs_course where cid=0");
        /*
         * 标题 title
         * 英文标题 etitle
         * 时间 ntime
         * 发布人 name
         * 摘要 summary
         * 点击量 hits
         * */
        $this->smarty->assign("nocat_course",$result2);
        $this->smarty->assign("course",$result);
        $this->smarty->display("admin/showcourse.html");
    }

    // 删除精品课程添加页
    function delcourse(){

        $db=new db("gs_course");
        $coid=P("coid");

        $result=$db->delete("coid=$coid");
        if($result>0){
            echo "删除成功";
        }else{
//            var_dump($result);
            echo "删除失败";
        }
    }
}