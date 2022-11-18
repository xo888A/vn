<?php
/**
 * 客户端请求本接口 实现支付
 * author: fengxing
 * Date: 2017/10/7
 */
 
error_reporting(E_ALL);
session_start();
$ddh = time() . mt_rand(1000, 9999); //商户订单号
$_SESSION['ddh'] = $ddh; //session存储商户订单号
$data = array(
    "fxid" => '2021186', //商户号
    "fxddh" => $ddh, //商户订单号
    "fxdesc" => $_POST['pay_productname'], //商品名
    "fxfee" => $_POST['pay_amount'], //支付金额 单位元
    "fxattch" => $_POST['param'], //附加信息
    "fxnotifyurl" => $_POST['pay_notifyurl'], //异步回调 , 支付结果以异步为准
    "fxbackurl" => $_POST['pay_callbackurl'], //同步回调 不作为最终支付结果为准，请以异步回调为准
    "fxpay" => $_POST['bankcode'], //支付类型 此处可选项为 微信公众号：wxgzh   微信H5网页：wxwap  微信扫码：wxsm   支付宝H5网页：zfbwap  支付宝扫码：zfbsm 等参考API
    //"fxip" => getClientIP(0, true) //支付端ip地址
    "fxip"=>'100.100.100.100'
);
$data["fxsign"] = md5($data["fxid"] . $data["fxddh"] . $data["fxfee"] . $data["fxnotifyurl"] . 'hnRapiSyJAzXHyzaxdsJKCbckCfTwpce'); //加密
$r = getHttpContent("http://pay.meilinshidiao.com/Pay", "POST", $data);
$r = json_decode($r, true); //json转数组

//验证返回信息
if ($r["status"] == 1) {
    header('Location:' . $r["payurl"]); //转入支付页面
    exit();
} else {
    //echo $r['error'].print_r($backr); //输出详细信息
    echo $r['error']; //输出错误信息
    exit();
}
function getHttpContent($url, $method = 'GET', $postData = array()) {
    $data = '';
    $user_agent = $_SERVER ['HTTP_USER_AGENT'];
    $header = array(
        "User-Agent: $user_agent"
    );
    if (!empty($url)) {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30); //30秒超时
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
            if (strtoupper($method) == 'POST') {
                $curlPost = is_array($postData) ? http_build_query($postData) : $postData;
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
            }
            $data = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {
            $data = '';
        }
    }
    return $data;
}
?>