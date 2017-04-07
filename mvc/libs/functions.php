<?php
    //处理所有的get和post的值
    function P($aa=""){
        if(isset($_GET[$aa])){
            return $_GET[$aa];
        }else if(isset($_POST[$aa])){
            return $_POST[$aa];
        }else{
            return false;
        }
    }
    //中间的字段是死的，建议每次更换数据库，做出更改
    class trees{
        function trees(){
            $this->str = "";
        }
        /*
         @param
             $pid    父类别id  全部查写0
             $flag   从第几级分类开始标识  全部查写0
             $table  表名
             $db     数据库名
             $current     获取当前分类的父id
        */
        //生成下拉菜单
        function tree($pid, $flag, $table, $db,$current=null){
            $currentPid=null;
            if($current){
                $result=$db->select("select * from $table where cid=".$current);
                $row=$result[0];
                $currentPid=$row["pid"];
            }
            //生成第一个option （李凯认为不需要这个，先注释掉，还是在外面写比较好用）
//            if($pid==0){
//                $this->str.="<option value='0'>一级标题</option>";
//            }
            //查询所有一级标题
            $sql = "select * from $table where pid=" . $pid;
            $result = $db->select($sql);
            if($result==false){
                return false;
            };
            $strflag=str_repeat("-",$flag);
            $flag=$flag+1;
            foreach($result as $key=>$row){
                $cid = $row["cid"];
                if($cid==$currentPid){
                    $this->str .= "<option value='$cid' selected='selected' >{$strflag}{$row["cname"]}</option>";
                }else{
                    $this->str .= "<option value='$cid' >{$strflag}{$row["cname"]}</option>";
                }
                //自调用
                $this->tree($cid, $flag, $table, $db,$current);
            }
        }
        /*
          @param
              $pid    父类别id  全部查写0
              $flag   从第几级分类开始标识  全部查写0
              $table  表名
              $db     数据库名
              $current     当前id ，讲当前id置为选中状态
         */
        //生成选中状态的下拉，出分类名
        function treeCur($pid, $flag, $table, $db,$current=null){
            //查询所有一级标题
            $sql = "select * from $table where pid=" . $pid;
            $result = $db->select($sql);
            if($result==false){
                return false;
            };
            $strflag=str_repeat("-",$flag);
            $flag=$flag+1;
            foreach($result as $key=>$row){
                $cid = $row["cid"];
                if($cid==$current){
                    $this->str .= "<option value='$cid' selected='selected' >{$strflag}{$row["cname"]}</option>";
                }else{
                    $this->str .= "<option value='$cid' >{$strflag}{$row["cname"]}</option>";
                }
                //自调用
                $this->tree($cid, $flag, $table, $db,$current);
            }
        }
        /*
        @param
            $pid    父级别的id
            $flag   标识，区分级别
            $table  表名
            $db     数据库名
       */
        //生成表格
        function table($pid, $flag, $table, $db){
            $sql = "select * from $table where pid=".$pid;
            $result = $db->select($sql);
            $strflag=str_repeat("-",$flag);
            $flag=$flag+1;
            while ($row = $result->fetch_assoc()) {
                $cid = $row["cid"];
                $pid=$row["pid"];
                $cname=$row["cname"];
                $this->str .= " <tr>
                                    <td>$cid</td>
                                    <td>{$strflag}{$cname}</td>
                                    <td>$pid</td>
                                    <td>
                                        <a href='delCategory.php?id=$cid'>删除</a>
                                        <a href='editCategory.php?id=$cid'>编辑</a>
                                    </td>
                                </tr>";
                $this->table($cid,$flag,$table,$db);
            }
        }
    }