<?php
    /*
     * public    公开
     * private   只能在本类内部
     * protected 只能在本类或者子类内部
     * static    静态的  这个方法或者属性只能作用在类的内部
     * */
    class route{
        /*
         * module 模块
         * model 模型
         * */
        private static $module;
        private static $file;
        private static $action;
        function init(){
            $this->getInfo();
        }
        function getInfo(){
            self::$module=isset($_REQUEST['m'])&&!empty($_REQUEST['m'])?$_REQUEST['m']:'index';
            self::$file=isset($_REQUEST['f'])&&!empty($_REQUEST['f'])?$_REQUEST['f']:'index';
            self::$action=isset($_REQUEST['a'])&&!empty($_REQUEST['a'])?$_REQUEST['a']:'init';
            $file="module/".self::$module."/".self::$file.".class.php";
            if(is_file($file)){
                include "$file";
                if(class_exists(self::$file)){
                    $obj=new self::$file();
                    if(method_exists($obj,self::$action)){
                        $mo=self::$action;
                        $obj->$mo();
                    }else{
                        echo self::$action."方法不存在";
                    }
                }else{
                    echo $file."类不存在";
                }
            }else{
                echo $file."文件不存在";
            }
        }
    }
/*
 * 初始化 init函数
 * getInfo 函数，获取信息
 *    先查看一下获取的信息指的这个文件存不存在
 * */









/*

    class aa{
        static $name="zhangsan";
        public $text="text";

        function say(){
            echo self::$name;
            echo aa::$name;
            echo $this->text;
        }
    }

    class bb extends aa{
        function say2(){
            echo $name;
            echo $this->text;
        }
    }*/


