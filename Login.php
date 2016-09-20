<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2016/9/1
 * Time: 22:06
 */
include ("PdoSql.php");
class Login{
    private $id;
    private $password;
    private $dbh;
    function __construct()
    {
        $this->dbh = new PDO("mysql:host=localhost;dbname=test","root","");
        $this->id = $_POST['username'];
        $this->password = $_POST['password'];
    }
    public function login(){
        session_start();
        $sql = "SELECT name,pass FROM regist WHERE name = $this->id";
        $row = $this->dbh->query($sql);
        $row->setFetchMode(PDO::FETCH_NUM);
        $r=$row->fetch();
//获取查询结果
        $sql_id = $r[0];
        $sql_pass = $r[1];
        if($_POST['denglu']){//点击登录
            if($sql_id==$this->id && $sql_pass==$this->password){
                $_SESSION['id'] = $this->id;
                $_SESSION['password'] = $this->password;
                $home_url = 'loged.php';
                header('Location:'.$home_url);
                echo "<script>location.href='';</script>";
            }else echo "<script>alert('登录失败!');history.go(-1);</script>";
        }
    }
}
$login = new Login();
$login->login();