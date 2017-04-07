<?php
class art extends main{
    function __construct(){
        parent::__construct();
        $this->db=new db("gs_notice");
    }
    /*
    * 新闻
    * */
    // 跳转到添加新闻页面
    function addnews(){
        $db=new db("gs_category");
        $tree=new trees();
        $tree->tree(0,0,"gs_category",$db);
        $this->smarty->assign("tree",$tree->str);
        $this->smarty->display("admin/addnews.html");
    }
    // 添加新闻页提交的数据放入数据库
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
        $result=$db->insert("insert into gs_news (title,etitle,name,summary,con,cid) values ('$title','$etitle','$name','$summary','$con','$cid')");
        if($result>0){
            $this->jump("index.php?m=admin&f=art&a=addnews","恭喜您！添加成功");
        }else{
            echo "添加失败";
        }
    }
    //  搜索出新闻内容。并将信息传入管理页
    function shownews(){
        $db=new db("gs_news");
//        $sql="select * from gs_news,gs_category where cid=0 or gs_news.cid=gs_category.cid ";
//        $sql="select * from gs_news where cid=0 or cid in (select * from gs_category) ";
        $sql="select * from gs_news,gs_category where gs_news.cid=gs_category.cid";
        $result=$db->select($sql);
        /*
         * 分页 出现两条
         * */
        $pages=new pages(count($result),2);
        $res=$db->select("select * from gs_news,gs_category where gs_news.cid=gs_category.cid order by gs_news.cid $pages->limit");
        $pages=$pages->out();
        /*
         * 标题 title
         * 内容 con
         * 时间 ntime
         * 发布人 name
         * 摘要 summary
         * 点击量 hits
         * */
        $this->smarty->assign("pages",$pages);
        $this->smarty->assign("news",$res);
        $this->smarty->display("admin/shownews.html");
    }
    // 删除新闻
    function delnews(){
        $db=new db("gs_news");
        $nid=P("nid");
        $result=$db->delete("nid=$nid");
        if($result>0){
            $this->jump("index.php?m=admin&f=art&a=shownews","恭喜您！添加成功");
        }else{
            var_dump($result);
            echo "删除失败";
        }
    }
    // 跳转到新闻修改页
    function editnews(){
        $db=new db("gs_news");
        $nid=P("nid");
        $result=$db->where("nid='$nid'")->select();
        $result=$result[0];
        $tree=new trees();
        $tree->treeCur(0,0,"gs_category",$db,$result['cid']);
        $this->smarty->assign("tree",$tree->str);
        $this->smarty->assign("news",$result);
        $this->smarty->display("admin/editnews.html");
    }
    // 修改新闻页提交的数据放入数据库
    function editnewsInfo(){
        $db=new db("gs_news");
        $nid=P("nid");
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
        $result=$db->update("update gs_news set title='$title',etitle='$etitle',name='$name',summary='$summary',con='$con',cid=$cid where nid=$nid");
        if($result>0){
            echo "修改成功";
        }else{
            echo "修改失败";
        }
    }
    // 搜索新闻内容
    function searchnews(){
        $db=new db("gs_news");
        $search=P("search");
        $startdate=strtotime(P("startdate"));
        $enddate=strtotime(P("enddate"));
        if($startdate==false){
            $sql="select * from gs_news,gs_category where ( gs_news.title  LIKE '%$search%' or gs_news.summary  LIKE '%$search%' or gs_category.cname LIKE '%$search%') and  gs_news.cid=gs_category.cid";
        }else if($enddate==false){
            $sql="select * from gs_news,gs_category where  UNIX_TIMESTAMP(ntime) >= $startdate and ( gs_news.title  LIKE '%$search%' or gs_news.summary  LIKE '%$search%' or gs_category.cname LIKE '%$search%') and  gs_news.cid=gs_category.cid";
        }else{
            $sql="select * from gs_news,gs_category where  UNIX_TIMESTAMP(ntime)>=$startdate and UNIX_TIMESTAMP(ntime)<=$enddate and ( gs_news.title  LIKE '%$search%' or gs_news.summary  LIKE '%$search%' or gs_category.cname LIKE '%$search%') and  gs_news.cid=gs_category.cid";
        }
        /*
         * 搜索标准：
         *  新闻名称
         *  新闻摘要
         *  分类名称
         *
         * */
        $result=$db->select("select * from gs_news,gs_category where ( gs_news.title  LIKE '%$search%' or gs_news.summary  LIKE '%$search%' or gs_category.cname LIKE '%$search%') and  gs_news.cid=gs_category.cid");
        $pages=new pages(count($result),2);
        $res=$db->select("select * from gs_news,gs_category where ( gs_news.title  LIKE '%$search%' or gs_news.summary  LIKE '%$search%' or gs_category.cname LIKE '%$search%') and  gs_news.cid=gs_category.cid order by gs_news.cid $pages->limit");
        $pages=$pages->out();
        $this->smarty->assign("pages",$pages);
        $this->smarty->assign("news",$res);
        $this->smarty->display("admin/shownews.html");
    }
    /*
     * 精品课程
     * */
    // 精品课程添加页
    function addcourse(){
        $this->smarty->display("admin/addcourse.html");
    }
    // 精品课程提交到数据库中
    function addcourseInfo(){
        $db=new db("gs_course");
        $title=P("title");  //文章标题
        $etitle=P("etitle");  //文章标题
        $label=P("label");  //标签名称
        $name=P("name");  //发布人
        $summary=P("summary");  //摘要
        $con=P("editor_id");  //内容
        if(empty($name)){
            $name="计算机信息工程学院";
        }
        $summary=str_ireplace(" ","",$summary);
        if(empty($summary)){
            $summary=$title;
        }
        $result=$db->insert("insert into gs_course (title,etitle,name,summary,con,label) values ('$title','$etitle','$name','$summary','$con','$label')");
        if($result>0){
            $this->jump("index.php?m=admin&f=art&a=addcourse","恭喜您！添加成功");
        }else{
            echo "添加失败";
        }
    }
    //  搜索出精品课程内容。并将信息传入管理页
    function showcourse(){
        $db=new db("gs_course");
        $result=$db->select("select * from gs_course");
        $pages=new pages(count($result),2);
        $res=$this->db->select("select * from gs_course order by ntime $pages->limit");
        $pages=$pages->out();
        /*
         * 标题 title
         * 英文标题 etitle
         * 时间 ntime
         * 发布人 name
         * 摘要 summary
         * 点击量 hits
         * */
        $this->smarty->assign("pages",$pages);
        $this->smarty->assign("course",$res);
        $this->smarty->display("admin/showcourse.html");
    }
    // 删除精品课程
    function delcourse(){
        $db=new db("gs_course");
        $coid=P("coid");
        $result=$db->delete("coid=$coid");
        if($result>0){
            $this->jump("index.php?m=admin&f=art&a=showcourse","恭喜您！删除成功");
        }else{
//            var_dump($result);
            echo "删除失败";
        }
    }
    // 修改精品课程
    function editcourse(){
        $db=new db("gs_course");
        $coid=P("coid");
        $result=$db->where("coid='$coid'")->select();
        $result=$result[0];
        $this->smarty->assign("course",$result);
        $this->smarty->display("admin/editcourse.html");
    }
    // 将修改后的精品课程更新到数据库
    function editcourseInfo(){
        $db=new db("gs_course");
        $coid=P("coid");
        $title=P("title");  //文章标题
        $etitle=P("etitle");  //文章标题
        $label=P("label");  //课程标签
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
        $result=$db->update("update gs_course set title='$title',etitle='$etitle',name='$name',summary='$summary',con='$con',label='$label' where coid=$coid");
        if($result>0){
            $this->jump("index.php?m=admin&f=art&a=showcourse","恭喜您！修改成功");
        }else{
            var_dump($result);
            echo "修改失败";
        }
    }
    /*
    * 学院公告
    * */
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
            $this->jump("index.php?m=admin&f=art&a=addnotice","恭喜您！添加成功");
        }else{
            echo "添加失败";
        }
    }
    //  搜索出公告内容。并将信息传入管理页
    function shownotice(){
        $result=$this->db->select();
        $pages=new pages(count($result),2);
        $res=$this->db->select("select * from gs_notice order by ntime $pages->limit");
        $pages=$pages->out();
        /*
         * 标题 ntitle
         * 内容 ncon
         * 时间 ntime
         * 发布人 nname
         * 摘要 nsummary
         * */
        $this->smarty->assign("pages",$pages);
        $this->smarty->assign("notice",$res);
        $this->smarty->display("admin/shownotice.html");
    }
    // 跳转到删除公告文章页面
    function delnotice(){
        $nid=P("nid");
        $result=$this->db->delete("nid=$nid");
        if($result>0){
            $this->jump("index.php?m=admin&f=art&a=shownotice","恭喜您！删除成功");
        }else{
            var_dump($result);
            echo "删除失败";
        }
    }
    // 跳转到公告修改页
    function editnotice(){
        $nid=P("nid");
        $result=$this->db->where("nid=$nid")->select();
        $result=$result[0];
        $this->smarty->assign("notice",$result);
        $this->smarty->display("admin/editnotice.html");
    }
    // 修改的公告文章内容放入数据库的函数
    function editnoticeInfo(){
        $nid=P("nid");
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
        $result=$this->db->update("update gs_notice set ntitle='$ntitle',nname='$nname',nsummary='$nsummary',ncon='$ncon' where nid=$nid");
        if($result>0){
            $this->jump("index.php?m=admin&f=art&a=shownotice","恭喜您！修改成功");
        }else{
            echo "修改失败";
        }
    }
    //搜索
    function searchnotice(){
        $search=P("search");
        $result=$this->db->select("select * from gs_notice where ntitle LIKE '%$search%' or nsummary  LIKE '%$search%'");
        /*
         * 分页
         * */
        $pages=new pages(count($result),2);
        $res=$this->db->select("select * from gs_notice where ntitle LIKE '%$search%' or nsummary  LIKE '%$search%' order by ntime $pages->limit");
        $pages=$pages->out();
        $this->smarty->assign("pages",$pages);
        $this->smarty->assign("notice",$res);
        $this->smarty->display("admin/shownotice.html");
    }
}