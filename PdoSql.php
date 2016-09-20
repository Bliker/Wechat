<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2016/8/30
 * Time: 21:51
 */
class PdoConn{
    public function __construct()
    {
    }
    public function connect(){
        try{
            $dbh = new PDO("mysql:host=localhost;dbname=test","root","");
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $dbh->exec("set names utf8");
        }catch (PDOException $e) {
            die("连接失败".$e->getMessage());
        }
    }
}
