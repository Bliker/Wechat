<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2016/8/9
 * Time: 22:52
 */
include("sendMsg.php");
class Regisrt
{
    private $username;
    private $password;
    private $p_num;
    private $message;
    private $v_code;
    public $result=0;
    private $dbh;

//$result = 0;
    public function __construct()
    {
        $this->dbh = new PDO("mysql:host=localhost;dbname=test", "root", "");
    }

    public function doRegister()
    {
        $this->username = $_POST['username'];//注册者的用户名
        $this->password = $_POST['password'];//密码
        $this->p_num = $_POST['p_num'];//注册者的手机号
        $this->message = $_POST['message'];//输入的验证码
        if(isset($_POST['send'])) {
            $this->SendMsg();

            }
        if(isset($_POST['sub'])){
            $this->judge();
        }
    }
    public function judge(){
        if ($this->message != $this->v_code) {
            echo "<script>alert('验证码错误！');history.go(-1);</script>";
            $this->result = 1;
        }
        if ($this->result == 1) {
            $sql = "INSERT INTO regist(name,pass,phone_num) VALUES ('$this->username','$this->password','$this->p_num')";//插入注册信息
            $this->dbh->query($sql);//执行sql语句
            echo "<script>alert('注册成功!');history.go(-1);</script>";
        }
    }
    public function SendMsg()
    {
        $sendMsg = new send();
        $this->v_code = $sendMsg->dayu($this->p_num);
    }

}
$regist = new Regisrt();
$regist->doRegister();
var_dump($_POST);