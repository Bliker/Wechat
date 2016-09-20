<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2016/9/20
 * Time: 19:23
 */
session_start();
if(isset($_SESSION['id'])){
    $_SESSION = array();
}