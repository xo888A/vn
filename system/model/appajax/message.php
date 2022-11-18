<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $page = intval(abs(CW('get/page',1)));
    $tel = CW('post/tel');
    $type = CW('post/type');

    
    if($type=='all'){
        $count = $db->get_count('sysmessage',"mtype='官方消息' || mtype='平台通知'");
    }else{
        $count = $db->get_count('sysmessage',"mtype='{$type}'");
    }

    
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    if($type=='官方消息' || $type=='平台通知'){
        $articles = $db->query('sysmessage','',"mtype='{$type}'",'id desc',"{$page},".PAGESIZE);
    }else{
        $articles = $db->query('sysmessage','',"mtype='官方消息' || mtype='平台通知'",'id desc',"{$page},".PAGESIZE);
    }
    $data = '';
    $tu = TU;
    $a = INDEX.'/index.php?mod=message&id=';
    foreach($articles as $article){
        $time = $article['ftime'];
        $con = strip_tags($article['content']);
        if($type=='平台通知'){
            $data .= "<li onclick='openmessage(\"{$article['id']}\")'>
                        <div>
                            <img src='{$tu}/msg1.png' class='msg1' />
                            <p class='p1'>Thông báo nền tảng</p>
                            <p class='p2 overhid'><a href='javascript:;' >{$con}</a></p>
                            <p class='p3'>{$time}</p>
                        </div>
                    </li>";
        }else if($type=='官方消息'){
            $data .= "<li onclick='openmessage(\"{$article['id']}\")'>
                        <div>
                            <img src='{$tu}/msg2.png' class='msg2' />
                            <p class='p1'>Thông tin chính thức</p>
                            <p class='p2 overhid'><a href='javascript:;' >{$con}</a></p>
                            <p class='p3'>{$time}</p>
                        </div>
                    </li>";
        }else{
           if($article['mtype']=='平台通知'){
                $i = 'msg1';
            }else{
                $i = 'msg2';
            }
            if($article['mtype']=='官方消息'){
                $newup = "Thông tin chính thức";
            }else{
                $newup = "Thông báo nền tảng";
            }
            $data .= "<li onclick='openmessage(\"{$article['id']}\")'>
                        <div>
                            <img src='{$tu}/{$i}.png' class='{$i}' />
                            <p class='p1'>{$newup}</p>
                            <p class='p2 overhid'><a href='javascript:;'>{$con}</a></p>
                            <p class='p3'>{$time}</p>
                        </div>
                    </li>";
        }
    	
    }
    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    ));
?>