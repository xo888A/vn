<?php
    if(!defined('CW')){exit('Access Denied');}
    class functions{

        /**
         * 获取客户端IP地址
         */
        static function get_real_ip(){
            return '';
            $ip = false;
            if (!empty($_SERVER["HTTP_CLIENT_IP"])) {$ip = $_SERVER["HTTP_CLIENT_IP"];}
            if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
                if ($ip) {array_unshift($ips, $ip);$ip = false;}
                for ($i = 0; $i < count($ips); $i++) {if (!eregi("^(10|172\.16|192\.168)\.", $ips[$i])) {$ip = $ips[$i];break;}}
            }
            return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
        }
        /**
         * 获取客户端地址
         */
        static function get_user_city($ip){
            if($ip){
                $ip = $ip;
            }else{
                $ip = functions::get_real_ip();
            }
            
            $url = "http://api.map.baidu.com/location/ip?ak=2TGbi6zzFm5rjYKqPPomh9GBwcgLW5sS&ip={$ip}";
            $arr = json_decode(@file_get_contents($url));
      
            return $arr->content->address;
        }
        /**
         * 设置cookie $day=天数
         * 单值用法:set_cookie('键','值','天数','目录');
         * 多值用法:set_cookie(数组,'天数','目录');
         **/
        static function set_cookie($cookie_name,$cookie_msg='',$day=1,$url='/'){
            $time = time();
            if(is_array($cookie_name)){
                $d = intval($cookie_msg);
                $day==7 ? INDEX : $day;
                foreach($cookie_name as $key=>$value){setcookie($key,$value,$time+$d*86400,$day,NULL,NULL,TRUE);}return;
            }
            setcookie($cookie_name,$cookie_msg, $time+$day*86400,$url,NULL,NULL,TRUE);
        }
        static function getTopicName($id){
            $db = self::db();
            $topic = $db->query('topic','name',"id='{$id}'");
            return $topic[0]['name'];
        }
        /**
         * url跳转
         * */
        static function url($url=INDEX){
            header("Location: {$url}");exit;
        }
        /**
         * PHP加密算法
         * $seed = 种子(10-99)
         * */
        static function  autocode($data,$type='+'){
            $temp = '';
            $data = strval($data);
            if($type=='+'){
                $seed = rand(10,99);
                for($i=0;$i<strlen($data);$i++){$temp .=(ord($data[$i])+$seed).'-';}
                $code = $temp.($seed+27);
                return strval($code);
            }elseif($type=='-'){
                $seed = intval(substr(strrchr($data,'-'),1));
                $seed = $seed-27;
                $code = explode('-',$data);
                array_pop($code);
                for($i=0;$i<count($code);$i++){$password .= chr(intval($code[$i])-$seed);}
                return strval($password);
            }else{
                exit('Encryption: error');
            }
        }
        
        /**
         * XML操作
         * $url_xml = xml文件路径
         * 循环可取键值
         * echo functions::xml('name.xml')->key;
         * */
        static function xml($url_xml){
            if(!file_exists($url_xml)){return 'The file does not exist!';}
            return simplexml_load_file($url_xml);
        }
        /**
         * 手机客户端验证
         **/
        static function is_mobile(){
            $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';  
            $mobile_browser = '0';  
            if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))  
            $mobile_browser++;  
            if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))  
            $mobile_browser++;  
            if(isset($_SERVER['HTTP_X_WAP_PROFILE']))  
            $mobile_browser++;  
            if(isset($_SERVER['HTTP_PROFILE']))  
            $mobile_browser++;  
            $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));  
            $mobile_agents = array(  
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',  
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',  
            'newt','noki','oper','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',  
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',  
            'wapr','webc','winw','winw','xda','xda-');  
            if(in_array($mobile_ua, $mobile_agents))  
            $mobile_browser++;  
            if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)  
            $mobile_browser++;  
            if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)  
            $mobile_browser=0;  
            if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)  
            $mobile_browser++;  
            if($mobile_browser>0){
                return true;  
            }else{
                return false;
            }
        }
        static function qrcode($data,$size=4,$margin=0){
            file::import('system-library-phpqrcode-phpqrcode');
            QRcode::png($data,false,'L',$size,$margin);
        }
        static function page($count='',$pagecount='',$url){
            if($count>PAGESIZE){
                $page = intval(CW('get/page',1));
                if(($page-1)<=0){$page = 1;}else if($page>$pagecount){$page=$pagecount;}
                if($pagecount<=6){
                    for($i =1; $i<=$pagecount; $i++){$pagenum .= "<li><a href='{$url}{$i}'>{$i}</a></li>";}
                }else{
                    if($page<5){
                        for($i =1; $i<=5; $i++){$pagenum.= "<li><a href='{$url}{$i}'>{$i}</a></li>";}
                        $pagenum.="<li><a>...</a></li><li><a href='{$url}{$pagecount}'>{$pagecount}</a></li>";
                    }elseif($page>=5 && $page+4<$pagecount){
                        $pagenum = "<li><a href='{$url}1'>1</a></li><li><a>...</a></li>";
                        for($i=$page-2;$i<=$page+2;$i++){$pagenum .= "<li><a href='{$url}{$i}'>{$i}</a></li>";}
                        $pagenum .= "<li><a>...</a></li><li><a href='{$url}{$pagecount}'>{$pagecount}</a></li>";
                    }else{
                        $pagenum = "<li><a href='{$url}1'>1</a></li><li><a>...</a></li>";
                        for($i=$pagecount-4;$i<=$pagecount;$i++){$pagenum.= "<li><a href='{$url}{$i}'>{$i}</a></li>";}
                    }
                }
                $prev = ($page-1)<=0 ? 1 : $page-1;
                $end = ($page+1)>=$pagecount ? $pagecount : $page+1;
                $prev_url = $url.$prev;
                $end_url = $url.$end;
                $prev = "<li><a href='{$prev_url}' class='prev'>Trang trước</a></li>";
                $end = "<li><a href='{$end_url}' class='next'>Trang sau</a></li>";
              //  $data = "<div class='pagewrap'><ul class='page overflow'><li><a href='{$url}1'>首页</a></li>{$prev}<div class='dline phonehide'>{$pagenum}</div>{$end}<li><a href='{$url}{$pagecount}'>末页</a></li></ul></div>";
                $data = "<div class='pagewrap'><ul class='page overflow'><li><a href='{$url}1'>Trang đầu</a></li>{$prev}<div class='dline phonehide'>{$pagenum}</div>{$end}<li><a href='{$url}{$pagecount}'>Trang cuối</a></li></ul></div>";
           
            }else{
                $data = '';
            }
            return $data;
        }
        /**
         * 验证码
         **/
        static function verification_code(){
            $extension = get_loaded_extensions();
            $res = in_array('gd',$extension);
            if(!$res){if(ERROR){file::debug('the extensions of gd is not found!','notice.dat');}return;}
            $size = 22;
            $font = ROOT_URL.'\system\library\font\Tenbitesch.ttf';
            $send1 = '123456789';
            $send2 = '+x';
            $num1 = $send1[rand(0,8)];
            $num2 = $send1[rand(0,8)];
            $symbol = $send2[rand(0,1)];
            $data = "{$num1}{$symbol}{$num2}=?";
            $symbol=='+' ? $result = intval($num1)+intval($num2) : $result = intval($num1)*intval($num2);
            self::set_cookie('code',self::autocode($result));
            $img = imagecreate(120,39);
            imagecolorallocate($img, 107,197,164);
            $fontcolor =imagecolorallocate($img,255,255,255);
            imagettftext($img,$size,0,25,30,$fontcolor,$font,$data);
            header('Content-Type: image/gif');
            imagegif($img);
        }
        /**
         * 字符串截取
         * 中文和字母均算1个单位长度
         **/
        static function cutstr($string,$length,$wb=' ....'){
            if(!function_exists(mb_substr)){
                if(ERROR){
                    file::debug('function->mb_substr is not exist','notice.dat');return;
                }
            }
            if(strlen($string)<=$length*3){
              return $string;
            }else{
              return mb_substr($string,0,$length,'utf-8').$wb;
            }
        }
        static function cut($str,$l=15){
            return self::cutstr($str,$l)."<a style='color:#FF7AA5' href='javascript:;' class='xq' data='{$str}'>[chi tiết]</a>";
        }
        static function cuts($str,$l=15){
            return self::cutstr($str,$l)."<a style='color:#FF7AA5' href='javascript:;' class='xq' data='{$str}'></a>";
        }
        static function cut2($str,$l=15){
            return self::cutstr($str,$l)."<a style='color:#FF7AA5' href='javascript:;' onclick='openalert(\"{$str}\")'>[chi tiết]</a>";
        }
        static function cut2s($str,$l=15){
            return self::cutstr($str,$l)."<a style='color:#FF7AA5' href='javascript:;' onclick='openalert(\"{$str}\")'></a>";
        }
        /**
        * 启用APP验证
        * 生成密钥：echo app_client()->createSecret();用于绑定客户端APP
        * 破解密钥：echo app_client()->getCode('VAZTUSPIFJDLMEMZ');得到6位数字用于和客户端匹配
        * 二维码扫描绑定(文件格式UTF-8): echo functions::qrcode('otpauth://totp/name?secret=TMRJYLSW5JT2L3TD&issuer='.urlencode('测试'),10,1)
        **/
        function app_client(){
            require("GoogleAuthenticator.php");
            $ga = new PHPGangsta_GoogleAuthenticator();
            return $ga;
        }
        /**
        * 是否是ajax请求
        **/
        static function is_ajax(){
            $ajax = isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest";
            if(!$ajax){
                exit('illegal request');
            }
        }
        /**
         * 前台弹窗
         **/
        static function show($m){
            $tpl =  new Society();
            $tpl->assign('message',$m);
            $tpl->compile('window','window');
            $vars = get_defined_vars();
            unset($vars);
            exit;
        }
        /**
         * 数据库实例化
         **/
        static function db(){
            global $_config;
            $db = new dbserver($_config);
            return $db;
        }
        /**
        * 记录PV
        **/
        static function record_pv(){
            $url = ROOT_URL.'/static/pv.dat';
            if (is_file($url)) {
                $count = file_get_contents($url);
                $count ++;
                file_put_contents($url, $count);
            } else {
                file_put_contents($url, 1);
            }
        }
        /**
        * 记录IP
        **/
        static function record_ip(){
            $ip = self::get_real_ip();
            $city = self::get_user_city($ip);
            $url = ROOT_URL.'/static/ip.dat';
            if (is_file($url)) {
                file_put_contents($url,"$ip"."-------"."$city"."\n",FILE_APPEND);
            } else {
                file_put_contents($url, "$ip"."-------"."$city"."\n");
            }
        }
        static function auth(){
        	
        }

        static function getfield($table,$field,$where){
            $db = self::db();
            if(!$where){
                $where = 'id=1';
            }
            $data = $db->query($table,$field,$where,'id desc',1);
            return $data[0][$field];
        }
        static function updatefield($table,$field,$value,$where){
            $db = self::db();
            $res = $db->exec($table,'u',"$field='{$value}',$where");
            return $res;
        }
         static function gettopic($topiclist,$type=1){
            foreach ($topiclist as $v){
              $topicname = self::getfield('topic','name',"id='{$v}'");
              if($type==1){
                  $topic1 .= "<a tapmode onclick=\"opentopiclist($v,'{$topicname}')\">{$topicname}</a> &bull; ";
              }elseif($type==2){
                  $topic2 .= "<a tapmode onclick=\"opentopiclist($v,'{$topicname}')\"><img src='../../image/ico_tag_bg.png'/>{$topicname}</a>";
              }elseif($type==3){
                  $topic3 .= "<p tapmode onclick=\"opentopiclist($v,'{$topicname}')\"><img src='../../image/ico_tag_bg.png'>{$topicname}</p>";
              }elseif($type==4){
                  $topic4 .= "<span tapmode onclick=\"opentopiclist($v,'{$topicname}')\"><img src='../../../image/ico_tag_bg.png'>{$topicname}</span>";
              }elseif($type==5){
                  $topic5 .= "<p tapmode onclick=\"opentopiclist($v,'{$topicname}',2)\"><img src='../../../image/ico_tag_bg.png'>{$topicname}</p>";
              }
            }
            if($type==1){
                return substr($topic1,0,-8);
            }elseif($type==2){
                return $topic2;
            }elseif($type==3){
                return $topic3;
            }elseif($type==4){
                return $topic4;
            }elseif($type==5){
                return $topic5;
            }
            
        }
        static function getnewtips($vipdiam,$diam){
            if($vipdiam){
              $tips = "<p class='num abs'>{$diam}Tiền vàng</p>";
            }elseif (!$vipdiam && $diam) {
                $tips = "<p class='vip abs'>VIP</p>";
            }else{
                //<p class='mian abs'>免费</p>
                $tips = '';
            }
            return $tips;
        }
        static function gettips($vipdiam,$diam,$type=1){
            if($type==2){
                if($vipdiam){
                  $tips = "<p class='diam abs'>{$diam}<img src='../../image/zuanshi_small.png'></p>";
                }elseif (!$vipdiam && $diam) {
                    $tips = "<p class='svip abs'><img src='../../image/ic_flag_vip.png'></p>";
                }else{
                    //<p class='mian abs'>免费</p>
                    $tips = '';
                }
            }else if($type==1){
                if($vipdiam){
                  $tips = "<span class='z'>{$diam}<img src='../../image/zuanshi_small.png' /></span>";
                }elseif (!$vipdiam && $diam) {
                    $tips = "<span class='v'><img src='../../image/ic_flag_vip.png'></span>";
                }else{
                    //<span class='m'>限免</span>
                    $tips = '';
                }
            }else if($type==3){
                if($vipdiam){
                  $tips = "<p class='z abs'>{$diam}<img src='../../image/zuanshi_small.png'></p>";
                }elseif (!$vipdiam && $diam) {
                    $tips = "<p class='v abs'><img src='../../image/ic_flag_vip.png'></p>";
                }else{
                    //<span class='m'>限免</span>
                    $tips = '';
                }
            }else if($type==4){
                if($vipdiam){
                  $tips = "<p class='diam abs'>{$diam}<img src='../../../image/zuanshi_small.png'></p>";
                }elseif (!$vipdiam && $diam) {
                    $tips = "<p class='svip abs'><img src='../../../image/ic_flag_vip.png'></p>";
                }else{
                    //<p class='mian abs'>免费</p>
                    $tips = '';
                }
            }else if($type==5){
                if($vipdiam){
                  $tips = "<span class='z'>{$diam}<img src='../../../image/zuanshi_small.png' /></span>";
                }elseif (!$vipdiam && $diam) {
                    $tips = "<span class='v'><img src='../../../image/ic_flag_vip.png'></span>";
                }else{
                    //<span class='m'>限免</span>
                    $tips = '';
                }
            }
            
            return $tips;
        }
        static function hot($hot){
            $hot = intval($hot);
            if($hot<1000){
                return $hot;
            }else if($hot>=1000 && $hot<10000){
                return round($hot/1000,2).'k';
            }else if($hot>=10000 && $hot<100000){
                return round($hot/10000,1).'w';
            }else if($hot>=100000){
                return round($hot/10000).'w';
            }
        }
        static function get_contents($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        static function put_contents($file,$content){
            $fp = fopen($file, 'w');
			fwrite($fp,$content);
			fclose($fp);
        }
        static function deldir($dir) {
           $dh=@opendir($dir);
           while ($file=@readdir($dh)) {
              if($file!="." && $file!="..") {
                 $fullpath=$dir."/".$file;
                 if(!is_dir($fullpath)) {
                    @unlink($fullpath);
                 } else {
                    deldir($fullpath);
                 }
              }
           }
           closedir($dh);
           if(rmdir($dir)) {
              return true;
           } else {
              return false;
           }
        }
        static function getavatar($tpl){
            $tel = getuser();
            $db = self::db();
            $user = $db->query('users','avatar',"tel='{$tel}'",'',1);
            $tpl->assign('avatar',$user[0]['avatar'] ? $user[0]['avatar'] : TU.'/default.jpg');
        }
        //注册加入代理
        static function intobroker($fu,$current,$time,$isdev,$card){
            $db = self::db();
            $timestart = strtotime(date('Y-m-d'),time());
	    	$timeend = $timestart+60*60*24;
	    	$level_dev_count = $db->get_count('level',"dev=1 and (ftime between {$timestart} and {$timeend})");
            $u = $db->query('users','',"tel='{$fu}'",'',1);
            $man = $u[0]['man'];//每满7扣2
            $man_kouliang =  $u[0]['kouliang'];
            $ctime = '';
            if($time){
                $ctime = $time;
            }else{
                $ctime = time();
            }
            $isexist = $db->query('level','',"tel='{$fu}' and tel2='{$current}' and level=1",'',1);
           
            if(!$isexist){
                $snum = $db->get_count('level',"tel='{$fu}'");
                $ishide = 0;
                // if(($snum+1)%$man==0 && $snum>0){
                //     $ishide = 1;
                // }elseif(($snum+2)%$man==0 && $snum>0){
                //     $ishide = 1;
                // }
                ///$man_kouliang=3
                // file::debug("用户扣量值:".$man_kouliang);
                // file::debug("snum:".$snum);
                // file::debug("man:".$man);
                for($i=1;$i<=$man_kouliang;$i++){
                    if(($snum+$i)%$man==0 && $snum>0){
                        $ishide = 1;
                        break ;
                    }
                }
                
                ///
                $res = $db->exec('level','i',array(
    	    		'tel'=>$fu,
    	    		'tel2'=>$current,
    	    		'level'=>1,
    	    		'ftime'=>$ctime,
    	    		'dev'=>$isdev,
    	    		'ishide'=>$ishide
    	    	));
    	    	if($res){
        	        
        	    	$curdayexist = $db->query('tongji','',"card='{$card}' and (ftime between {$timestart} and {$timeend})");
        	    	$curdayexist2 = $db->query('alltongji','',"(ftime between {$timestart} and {$timeend})");
        	    	if($ishide){
        	    	    $kl = 1;
        	    	}else{
        	    	    $kl = 0;
        	    	}
        	    	if($curdayexist){
        	    	    $ip = intval($curdayexist[0]['ip'])+1;
        	    	    $regnum = intval($curdayexist[0]['regnum'])+1;
        	    	    $downnum = intval($curdayexist[0]['downnum']);
    	    	        $downnumkouliang = intval($curdayexist[0]['downnumkouliang']);
    	    	        $regkouliang = intval($curdayexist[0]['regkouliang'])+$kl;
        	    	    if($isdev){
        	    	        $activation = 'fail';
        	    	        for($i=1;$i<=$man_kouliang;$i++){
        	    	            $he = $level_dev_count+$i;
                                if(($he)%$man==0 && $level_dev_count>0){
                                    $activation = 'success';
                                    break ;
                                }
                            }
                            if($activation=='success'){
                                $downnumkouliang++;
                            }else{
                                $downnum++;
                            }
        	    	    }
        	    	   if(!$man){
        	    	       $regkouliang = intval($curdayexist[0]['regkouliang']);
        	    	       $downnumkouliang = intval($curdayexist[0]['downnumkouliang']);
        	    	   }
        	    	   
        	    	    $sql = "update tongji set regkouliang='{$regkouliang}',ip='{$ip}',regnum='{$regnum}',downnum='{$downnum}',downnumkouliang='{$downnumkouliang}' where card='{$card}' and (ftime between {$timestart} and {$timeend})";
        	    	    //$sql2 = "update alltongji set regkouliang='{$regkouliang},'ip='{$ip}',regnum='{$regnum}',downnum='{$downnum}',downnumkouliang='{$downnumkouliang}' where  (ftime between {$timestart} and {$timeend})";
        	    	    $db->exec($sql);
        	    	    //$db->exec($sql2);
        	    	}else{
        	    	    $db->exec('tongji','i',array(
        	    	        'card'=>$card,
        	    	        'shouru'=>0,
        	    	        'ip'=>1,
        	    	        'regnum'=>1,
        	    	        'downnum'=>$isdev,
        	    	        'downnumkouliang'=>0,
        	    	        'chongzhi'=>0,
        	    	        'kouliang'=>0,
        	    	        'dailishouru'=>0,
        	    	        'pingtaishouru'=>0,
        	    	        'ftime'=>time()
        	    	    ));
        	    	    
        	    	}
        	    	if(!$curdayexist2){
        	    	    $db->exec('alltongji','i',array(
        	    	        'ip'=>1,
        	    	        'shouru'=>0,
        	    	        'regnum'=>1,
        	    	        'downnum'=>$isdev,
        	    	        'downnumkouliang'=>0,
        	    	        'chongzhi'=>0,
        	    	        'kouliang'=>0,
        	    	        'dailishouru'=>0,
        	    	        'pingtaishouru'=>0,
        	    	        'ftime'=>time()
        	    	    ));
        	    	}else{
        	    	    $ip = intval($curdayexist2[0]['ip'])+1;
        	    	    $regnum = intval($curdayexist2[0]['regnum'])+1;
        	    	    $downnum = intval($curdayexist2[0]['downnum']);
    	    	        $downnumkouliang = intval($curdayexist2[0]['downnumkouliang']);
        	    	    if($isdev){
        	    	        $activation = 'fail';
        	    	        for($i=1;$i<=$man_kouliang;$i++){
        	    	            $he = $level_dev_count+$i;
                                if(($he)%$man==0 && $level_dev_count>0){
                                    $activation = 'success';
                                    //$regkouliang++;
                                    break ;
                                }
                            }
                            if($activation=='success'){
                                $downnumkouliang++;
                            }else{
                                $downnum++;
                            }
        	    	    }
        	    	    $regkouliang = intval($curdayexist2[0]['regkouliang'])+$kl;
        	    	    if(!$man){
        	    	       $regkouliang = intval($curdayexist2[0]['regkouliang']);
        	    	       $downnumkouliang = intval($curdayexist2[0]['downnumkouliang']);
        	    	   }
        	    	    $sql2 = "update alltongji set regkouliang='{$regkouliang}',ip='{$ip}',regnum='{$regnum}',downnum='{$downnum}',downnumkouliang='{$downnumkouliang}' where  (ftime between {$timestart} and {$timeend})";
        	    	    $db->exec($sql2);
        	    	}
    	    	}
            }
	    	/*邀请送VIP*/
            // $invite = $db->get_count('level',"tel='{$fu}' and level=1");
            // $parentuser = $db->query('users','viptime,mylevel',"tel='{$fu}'",'',1);
            // $mylevel = $parentuser[0]['mylevel'];
            // $parentuser_viptime = $parentuser[0]['viptime'];
            // $curtime = time();
            // if($parentuser_viptime<$curtime){
            //     $parentuser_viptime = $curtime;
            // }
            // $sets = $db->query('sets','inviteuser1,inviteuser2,inviteuser3,inviteuser4,inviteday1,inviteday2,inviteday3,inviteday4','','id asc',1);
            // if($invite==$sets[0]['inviteday1']){
            //     $day1 = intval($sets[0]['inviteday1'])*86400;
            //     $parentuser_viptime = $parentuser_viptime+$day1;
            // }elseif($invite==$sets[0]['inviteday2']){
            //     $day2 = intval($sets[0]['inviteday2'])*86400;
            //     $parentuser_viptime = $parentuser_viptime+$day2;
            // }elseif($invite==$sets[0]['inviteday3']){
            //     $day3 = intval($sets[0]['inviteday3'])*86400;
            //     $parentuser_viptime = $parentuser_viptime+$day3;
            // }elseif($invite==$sets[0]['inviteday4']){
            //     $day4 = intval($sets[0]['inviteday4'])*86400;
            //     $parentuser_viptime = $parentuser_viptime+$day4;
            // }
            // if($curtime!=$parentuser_viptime){
            //     if($mylevel>0){
            //         $mylevel = $mylevel;
            //     }else{
            //         $mylevel = 1;
            //     }
            //     $db->exec('users','u',array(array(
            //         'viptime'=>$parentuser_viptime,
            //         'mylevel'=>$mylevel
            //     ),array(
            //         'tel'=>$fu
            //     )));
            // }
	    	//$otherdailis = $db->query('level','tel,level',"tel2='{$fu}'");
	    	//if($otherdailis){
	    		//foreach ($otherdailis as $otherdaili){
	    			//if($otherdaili['level']=='1'){
	    			    // $isexist2 = $db->query('level','',"tel='{$otherdaili['tel']}' and tel2='{$current}' and level=2",'',1);
	    			    // if(!$isexist2){
	    			    //     $db->exec('level','i',array(
    				    // 		'tel'=>$otherdaili['tel'],
    				    // 		'tel2'=>$current,
    				    // 		'level'=>2,
    				    // 		'dev'=>$isdev,
    				    // 		'ftime'=>time()
    				    // 	));
	    			    // }
	    				
	    			//}
	    			// elseif($otherdaili['level']=='2') {
	    			//     $isexist3 = $db->query('level','',"tel='{$otherdaili['tel']}' and tel2='{$current}' and level=3",'',1);
	    			//     if(!$isexist3){
	    			//         $db->exec('level','i',array(
    				//     		'tel'=>$otherdaili['tel'],
    				//     		'tel2'=>$current,
    				//     		'level'=>3,
    				//     		'dev'=>$isdev,
    				//     		'ftime'=>time()
    				//     	));
	    			//     }
	    			// }
	    		//}
	    	//}
	    	return $res;
	    }
	    function addhot($postid){
	        $db = self::db();
	        $hot = $db->query('post','hot',"id='{$postid}'",'',1);
	        $hot = $hot[0]['hot']+1;
	        $db->exec('post','u',"hot='{$hot}',id='{$postid}'");
	    }
	    function follow($user,$tpl){
	        $db = self::db();
	        $us = functions::autocode(CW('cookie/__username'),'-');
	        $isfollow = $db->query('follow','',"tel1='{$us}' and tel2='{$user}'",'',1);
	        if($isfollow){
                $tpl->assign('guanzhu',"<a href='javascript:;' class='followuser user_{$user}' user='{$user}'  style='background:#ccc'>Đã theo dõi</a>");
            }else{
                $tpl->assign('guanzhu',"<a href='javascript:;' class='followuser user_{$user}' user='{$user}'>Theo dõi</a>");
            }
	    }
	    function history($id){
	        $db = self::db();
	        $user = functions::autocode(CW('cookie/__username'),'-');
	        $exist = $db->query('history','vid',"dev='{$user}' and vid='{$id}'");
	        if(!$exist){
	            $db->exec('history','i',array(
	                'dev'=>$user,
	                'vid'=>$id,
	                'ftime'=>time()
	            ));
	        }
	    }
	    function history2($id,$user){
	        $db = self::db();
	       
	        $exist = $db->query('history','vid',"dev='{$user}' and vid='{$id}'");
	        if(!$exist){
	            $db->exec('history','i',array(
	                'dev'=>$user,
	                'vid'=>$id,
	                'ftime'=>time()
	            ));
	        }
	    }
	    

	    static function bonus($son,$id,$type){
	        $price = 0;
	        $db = self::db();
	        $ishide = $db->query('level','ishide',"tel2='{$son}'",'',1);
	        if($ishide[0]['ishide']){
	            return;
	        }
	        if($type=='vip'){
	            $price = $db->query('vipcard','nowprice',"id='{$id}'");
	            $price = intval($price[0]['nowprice']);
	        }else if($type=='jinbi'){
	            $price = $db->query('diamcard','price',"id='{$id}'");
	            $price = intval($price[0]['price']);
	        }
	        $sets = $db->query('sets','r1,r2,r3,p1,p2,p3,p4,p5,f1,f2,f3','','id asc',1);
	        $r1 = floatval($sets[0]['r1']);
	        $r2 = floatval($sets[0]['r2']);
	        $r3 = floatval($sets[0]['r3']);
	        $p1 = intval($sets[0]['p1']);
	        $p2 = intval($sets[0]['p2']);
	        $p3 = intval($sets[0]['p3']);
	        $p4 = intval($sets[0]['p4']);
	        $p5 = intval($sets[0]['p5']);
	        $f1 = floatval($sets[0]['f1']);
	        $f2 = floatval($sets[0]['f2']);
	        $f3 = floatval($sets[0]['f3']);
	        $users = $db->query('level','tel,level',"tel2='{$son}'");
	        
	        if($users){
	            foreach ($users as $parent){
    	            $r = $bonus = 0;
    	            $tel = $parent['tel'];
    	            $level = $parent['level'];
    	            if($level==1){
    	                $r = $r1;
    	            }
    	            
    	           // else if($level==2){
    	           //     $r = $r2;
    	           // }else if($level==3){
    	           //     $r = $r3;
    	           // }
    	            
    	            $user_money = $db->query('users','money',"tel='{$tel}'",'',1);
    	            
    	            $parent_pay = $db->query("select sum(pay) from pays where tel='{$tel}'");//充值总数
    	            
    	           // $parent_pay = intval($parent_pay[0]["sum(pay)"]);
    	           // if($parent_pay>=$p1 && $parent_pay<=$p2){
    	           //     $bonus = $price*$f1*$r;
    	           // }else if($parent_pay>=$p3 && $parent_pay<=$p4){
    	           //     $bonus = $price*$f2*$r;
    	           // }else if($parent_pay>=$p5){
    	           //     $bonus = $price*$f3*$r;
    	           // }
    	            $bonus = round($price*$r,2);
    	            $money = $user_money[0]['money']+$bonus;
    	            $money = round($money,2);
    	            //更新用户金额
    	            $res = $db->exec('users','u',"money='{$money}',tel='{$tel}'");
    	            //更新记录earnings
    	            if($res){
    	                ///////////////////////////////////////
    	           //     $timestart = strtotime(date('Y-m-d'),time());
            	   // 	$timeend = $timestart+60*60*24;
            	   // 	$curdayexist = $db->query('tongji','',"card='{$card}' and (ftime between {$timestart} and {$timeend})");
    	                
    	                
    	                ///////////////////////////////////////
    	                $db->exec('earnings','i',array(
        	                'parent'=>$tel,
        	                'ftime'=>time(),
        	                'currtel'=>$son,
        	                'level'=>$level,
        	                'earnings'=>$bonus,
        	                'price'=>round($price,2)
        	            ));
    	            }
    	            
    	        }
	        }
	        
	    }
	   
	    //充值
	    static function pay($tel,$id,$type){
	        $db = self::db();
	        $user = $db->query('users','viptime,mylevel,diam',"tel='{$tel}'",'',1);
	        $viptime = $user[0]['viptime']>time() ? $user[0]['viptime'] : time();
	        $mylevel = $user[0]['mylevel'];
	        $diam = intval($user[0]['diam']);
	        if($type=='vip'){
	            $vipcard = $db->query('vipcard','adddiam,days,nowprice',"id='{$id}'");
	            $nviptime = intval($viptime)+intval($vipcard[0]['days']*24*60*60);
	            $ndiam = $diam+intval($vipcard[0]['adddiam']);
	            $price = $vipcard[0]['nowprice'];
	            $res = $db->exec('users','u',array(array(
	                'viptime'=>$nviptime,
	                'diam'=>$ndiam,
	                'mylevel'=>intval($id)
	            ),array(
	                'tel'=>$tel    
	            )));
	        }else if($type=='jinbi'){
	            $diamcard = $db->query('diamcard','diamnum,give,price',"id='{$id}'");
	            $newdiam = $diam+intval($diamcard[0]['diamnum'])+intval($diamcard[0]['give']);
	            $price = $diamcard[0]['price'];
	            $res = $db->exec('users','u',array(array(
	                'diam'=>$newdiam
	            ),array(
	                'tel'=>$tel    
	            )));
	        }
	        return $price;
	    }
	    static function gettopiclist(){

	        $db = self::db();
	        $topics = $db->query('sets','tuijianlist','id=1');
            $topics = $topics[0]['tuijianlist'];
            $topics = explode(',',$topics);
            $t = '';
            foreach ($topics as $topic){
                $ts = $db->query('topic','',"name='{$topic}'");
                $url = INDEX.'/index.php?mod=topiclist&id='.$ts[0]['id'];
                $t .= "<li tapmode onclick='opentopic(\"{$topic}\")'><a href='javascript:;' >{$topic}</a></li>";
            }
            $menu = "<div class='list hide'>
            <p class='category'>Danh mục phân loại</p>
            <img src='../image/close.png' class='closecategory' onclick='closecategory()' />
            <ul class='overflow datatopic'>
                {$t}
                <li class='special'><a href='javascript:;' onclick=\"openwin('alltopiclist','reload')\">Kiểm tra toàn bộ phân loại+</a></li>
            </ul>
        </div>";
            return $menu;
	    
	    }
	    static function getnickname($nickname){
            $db = self::db();
	        $isadmin =  $db->query('users','addparam',"nickname='{$nickname}'",'',1);
	        if($isadmin[0]['addparam']=='管理员'){
	            return "<span style='color:#ff005e;margin-left:1px'>{$nickname}</span>";
	        }else{
	            return $nickname;
	        }
	    }
	    static function isadmin($tel){
	        $db = self::db();
	        $isadmin =  $db->query('users','addparam',"tel='{$tel}'",'',1);
	        if($isadmin[0]['addparam']=='管理员'){
	            return true;
	        }else{
	            return false;
	        }
	        
	    }
	    static function data($l,$type){
	        $list = "21,21,21,21";
	        $db = self::db();
	        if($l=='index'){
	            $list = $db->query('sets','add1','id=1');
	            $list = $list[0]['add1'];
	        }elseif($l=='organ'){
	            $list = $db->query('sets','add3','id=1');
	            $list = $list[0]['add3'];
	        }elseif($l=='video'){
	            $list = $db->query('sets','add2','id=1');
	            $list = $list[0]['add2'];
	        }
	        $postids = explode(',',$list);
          
	        $data = '';
	        foreach ($postids as $postid){
                $article = $db->query('post','',"id='{$postid}' and shortvidurl=''",'',1);$article = $article[0];
                $time = date('Y-m-d',$article['ftime']);
                $cover = $article['videocover'];
            	$title = $article['title'];
            	$likes = functions::hot($article['likes']);
            	$hot = functions::hot($article['hot']);
                $a = TU.'/a.png';
                $b = TU.'/b.png';
                $c = TU.'/c.png';
                $cover = $v = '';
                if($article['videocover']!=''){
                    $v = "<img class='vimg abs' src='".TU."/video.png' />";
                    $cover = $article['videocover'];
                    $tag = "{$article['addparam']}";
                    $href = INDEX.'/index.php?mod=video&id='.$article['id'];$_t ='video';
                }else if($article['imglist']!=''){
                    // $pos = stripos($article['imglist'],'|');
                    // $v = '';
                    // if($pos){
                    //     $cover = substr($article['imglist'],0,$pos);
                    // }else{
                    //     $cover = $article['imglist'];
                    // }
                    $cover = $article['organcover'];
                    $i = TU.'/t.png';
                    $addparam = $article['addparam'] ? $article['addparam'] : 0;
                    $tag = "<img src='{$i}'>{$addparam}";
                    $href = INDEX.'/index.php?mod=organ&id='.$article['id'];$_t ='organ';
                }
                $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
                if($article['shortvidurl']!=''){
                    $_t= 'shortvideo';
                }
                if($type=='app'){
                   
                    $data .= "<div class='swiper-slide'>
                        <div class='rel'>
                            <a href='javascript:;' onclick='openvideo(\"{$article['id']}\",\"$_t\")'><img class='cover' src='{$cover}'>
                            {$tips}
                            <p class='tag2 abs'>{$tag}</p>
                            {$v}</a>
                        </div>
                        <p class='overhid t'>{$title}</p>
                        <p class='ts'><img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
                    </div>";
                }else if($type=='pc'){
                    $data .= "<li>
                        <div class='rel'>
                            <a href='{$href}'><img class='cover' src='{$cover}' />
                            {$tips}
                            <p class='tag2 abs'>{$tag}</p>
                            {$v}</a>
                        </div>
                        <p class='overhid t'><a href='{$href}'>{$title}</a></p>
                        <p class='ts'><img src='{$a}' />{$time}<span class='phonehide'><img src='{$b}' class='b' />{$hot}</span><img class='c' src='{$c}' />{$likes}</p>
                    </li>";
                }else if($type=='h5'){
                    $data .= "<div class='swiper-slide'>
                        <div class='rel'>
                            <a href='{$href}' ><img class='cover' src='{$cover}'>
                            {$tips}
                            <p class='tag2 abs'>{$tag}</p>
                            {$v}</a>
                        </div>
                        <p class='overhid t'>{$title}</p>
                        <p class='ts'><img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
                    </div>";
                }
                
            }
            return $data;
	    }
    }

?>