<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2016/8/17
 * Time: 22:42
 */
class Conn{
    public function __construct(){}
    public function connect(){
        $dbms = 'mysql';//数据库类型
        $host = 'localhost';//主机名
        $dbName = 'regist';//使用的数据库的名字
        $user = 'root';//用户名
        $pass = '';//密码
        $dsn = "$dbms:host=$host;dbname=$dbName";

        try{
            $dbh = new PDO($dsn,$user,$pass);//初始化一个PDO对象
        }catch (PDOException $e){
            die("Error!:".$e->getMessage()."<br>");
        }
    }

}
