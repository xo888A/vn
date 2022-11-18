<?php

/**
 * 客户端请求本接口 异步回调
 * author: fengxing
 * Date: 2017/10/7
 */
error_reporting(E_ALL);
session_start();
require("../config.inc.php");
require("../system/runtime.php");
$fxid = $_REQUEST['fxid']; //商户编号
$fxddh = $_REQUEST['fxddh']; //商户订单号
$fxorder = $_REQUEST['fxorder']; //平台订单号
$fxdesc = $_REQUEST['fxdesc']; //商品名称
$fxfee = $_REQUEST['fxfee']; //交易金额
$fxattch = $_REQUEST['fxattch']; //附加信息
$fxstatus = $_REQUEST['fxstatus']; //订单状态
$fxtime = $_REQUEST['fxtime']; //支付时间
$fxsign = $_REQUEST['fxsign']; //md5验证签名串

$mysign = md5($fxstatus . $fxid . $fxddh . $fxfee . 'hnRapiSyJAzXHyzaxdsJKCbckCfTwpce'); //验证签名
//记录回调数据到文件，以便排错
// if ($fxloaderror == 1)
//     file_put_contents('./demo.txt', '异步：' . serialize($_REQUEST) . "\r\n", FILE_APPEND);

if ($fxsign == $mysign) {
    if ($fxstatus == '1') {//支付成功
        //支付成功 更改支付状态 完善支付逻辑
        $ddh = $_SESSION['ddh'];
        
        $test = $fxattch;
        $tel = substr($test,0,strrpos($test,'|'));
    	$type = substr($test,strripos($test,'-')+1);
    	$id =substr($test,strrpos($test,'|')+1);
    	$id =substr($id,0,strrpos($id,'-'));

    	
    	$price = functions::pay($tel,$id,$type);
        functions::bonus($tel,$id,$type);

        $db = functions::db();
        $db->exec('pays','i',array(
            'tel'=>$tel,
            'pay'=>1000,
            'paytype'=>$type,
            'ftime'=>time(),
            'payorder'=>md5(uniqid()),
            'mchorderno'=>$_POST["orderid"]
        ));
        
        
        echo 'success';
    } else { //支付失败
        echo 'fail';
    }
} else {
    echo 'sign error';
}
?>