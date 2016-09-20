<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2016/8/10
 * Time: 22:25
 */
include "TopSdk.php";
class Send{
    public function dayu($number){
        $v_code = mt_rand(1000,9999);
        $c = new TopClient();
        $c->appkey = "23431657";
        $c->secretKey = "1bb2abad78be4a3004647144797a5d32";
        $req = new AlibabaAliqinFcSmsNumSendRequest();
	    $req->setExtend("123456");
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("梅州TXH");
        $req->setSmsParam("{\"v_code\":\"".$v_code."\"}");
        $req->setRecNum($number);
        $req->setSmsTemplateCode("SMS_14990088");
        $c->execute($req);
        return $v_code;
    }
}

