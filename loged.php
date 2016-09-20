<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2016/9/20
 * Time: 19:15
 */
   session_start();
   if(isset($_SESSION['id'])){
       echo 'You are Logged as '.$_SESSION['id'].'<br/>';
       echo '<a href="logOut.php"> Log Out('.$_SESSION['id'].')</a>';
   }