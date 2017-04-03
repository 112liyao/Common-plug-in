<?php
class db{
    public $hostname="localhost"; //初始化服务器域名
    public $dbname="sxtbu_jsj";// 数据库名称
    private $username="root";
    private $password="";
    public $tablename="";//要操作的表格的名称
    public $connect;//连接db
    public $fileds; //保存一系列sql语句组合
    public $insert_id;
    /*
     * @param    string  要操作的数据库的表名，必须传参
     * @example  new db('table');
     * */
    function __construct($tablename){
        if(!isset($tablename)){
            echo "请传入您要操作的表名";
            exit;
        }
        $this->tablename=$tablename;
        $this->config();
    }
    public function config(){
        $this->connect=mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname);
        if(mysqli_connect_error()){
            echo "连接 MYSQL 失败";
            $this->connect->close();
            exit;
        };
        $this->connect->query("set names utf8");
        $this->fileds['filed']=$this->fileds['filed']?$this->fileds['filed']:"*";
        $this->fileds['where']=$this->fileds['order']=$this->fileds['limit']="";
    }
    /*
     * @param    [string](sql,key)  可以传入sql语句，你要查找的字段名
     * @example  select('name')
     *           select('name,sex')
     *           select('select * from table');
     * @return   返回一个数组，数组中保存查询到的结果
     * */
    //select 1.可以不传（连接where） 2.或者整条语句全部传进来  3.
    public function select($opt=""){
        $sql=empty($opt)?"select ".$this->fileds['filed']." from ".$this->tablename." ".$this->fileds['where']." ".$this->fileds["order"]." ".$this->fileds["limit"]:$opt;
        if(strpos($sql,"select")===false){
            $sql="select ".$sql." from ".$this->tablename." ".$this->fileds['where'];
        }
        $result=$this->connect->query($sql);
        $arr=array();
        while($row=$result->fetch_assoc()){
            $arr[]=$row;
        }
        return $arr;
    }
    /*@param    [string] 表示查找的字段
      @example  filed('name,age')  【select】
      @example  filed("name='zhangsan',age='12'") 【update】
      @example  filed("name='zhangsan';age='12'")  【insert】
      @example  filed("name='zhangsan'")  【update,insert】
      @return   当前对象的指针
    */
    //添加或者修改得字段
    public function filed($opt=""){
        $sql=$opt==""?"*":$opt;
        if(strpos($sql,";")){
            //新增
            $keys="";
            $values="";
            $arr=explode(";",$sql);
            foreach($arr as $v){
                $temp=explode("=",$v);
                $keys.=$temp[0].",";
                $values.=$temp[1].",";
            }
            $keys=substr($keys,0,-1);
            $values=substr($values,0,-1);
            $sql="(".$keys.") values (".$values.")";
        };
        $this->fileds['filed']=$sql;
        return $this;
    }
    /*
     * @param   [string]
     * @example where('id=1')
     * @return  当前对象的指针
     * */
    //条件语句
    public function where($opt=""){
        $this->fileds["where"]=$opt==""?"":"where ".$opt;
        return $this;
    }
    /*
     * @param    string
     * @example  order("age desc")
     * @return   当前对象的指针
     * */
    //通过什么排序
    public function order($opt=""){
        $this->fileds["order"]=$opt==""?"":"order by ".$opt;
        return $this;
    }
    /*
     * @param    string (index,length)
     * @example  limit("0,2")
     * @example  limit("limit 0,2")
     * @return   当前对象的指针
     * */
    //截取  传入(0,1) or  传入  (limit 0,1)
    public function limit($opt=""){
        if(strpos($opt,"mit")){
            $this->fileds["limit"]=$opt;
        }else{
            $this->fileds["limit"]=$opt==""?"":"limit ".$opt;
        }
        return $this;
    }
    /*
     * @param   [string](sql,string)
     * @example update();
     * @example update("name='zhangsan' , age='12'");
     * @example update("name='zhangsan' , age='12' where id=1");
     * @example update("update table set name='zhangsan',age='12' where id=1");
     * @return  操作影响的行数 -1表示执行sql语句失败
     * */
    //修改
    public function update($opt=""){
        $sql=empty($opt)?"update ".$this->tablename." set ".$this->fileds["filed"]." ".$this->fileds['where']:$opt;
        if(strpos($sql,'update')===false){
            if(strpos($sql,"where")){
                $sql="update ".$this->tablename." set ".$sql;
            }else{
                $sql="update ".$this->tablename." set ".$sql." ".$this->fileds['where'];
            }
        }
        $this->connect->query($sql);
        return $this->connect->affected_rows;
    }
    /*
     * @param    [string](sql,string)
     * @example  delete();
     * @example  delete('id=3');
     * @example  delete("delete from table where name='zhangsan'");
     * @return   操作影响的行数 -1表示执行sql语句失败
     * */
    //删除
    public function delete($opt=""){
        $sql=empty($opt)?"delete from ".$this->tablename." ".$this->fileds['where']:$opt;
        if(strpos($sql,"delete")===false){
            $sql="delete from ".$this->tablename." where ".$sql;
        }
        $this->connect->query($sql);
        return $this->connect->affected_rows;
    }
    /*
     * @param   [string](sql,string)
     * @example insert();
     * @example insert("name='zhangsan'");
     * @example insert("name='zhangsan' ; age='12'");
     * @example insert("insert into table (name,age) values ('zhangsan','12')")
     * @return  操作影响的行数 -1表示执行sql语句失败
     * */
    //添加
    public function insert($opt=""){
        //判定传入得值
        if(empty($opt)){
            if(strpos($this->fileds["filed"],"=")){
                $temp=explode("=",$this->fileds["filed"]);
                $sql="insert into ".$this->tablename." (".$temp[0].") values (".$temp[1].")";
            }else{
                $sql="insert into ".$this->tablename." ".$this->fileds['filed'];
            }
        }else{
            $sql=$opt;
        }
        //判定是否传入的是整句
        if(strpos($sql,"insert")===false){
            if(strpos($sql,";")){
                $this->filed($sql);
                $sql="insert into ".$this->tablename." ".$this->fileds["filed"];
            }else if(strpos($sql,"=")){
                $temp=explode("=",$sql);
                $sql="insert into ".$this->tablename." (".$temp[0].") values (".$temp[1].")";
            }
        }
        //输出
        $this->connect->query($sql);
        $this->insert_id=$this->connect->insert_id;
        return $this->connect->affected_rows;
    }
}
/*
 * //测试
$db=new db("stu");
//    $arr=$db->select("select name from stu where id=0");
//    $arr=$db->insert("insert into table (name,age) values ('zhangsan','12')");
//    $arr=$db->where("id=0")->delete();
$arr=$db->filed("age='10'")->where("id=10")->update("name='zhangsan'");
var_dump($arr);*/
?>