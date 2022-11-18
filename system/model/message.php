<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tpl =  new Society();
    $tel = functions::autocode(CW('cookie/__username'),'-');
    $user = $db->query('users','avatar',"tel='{$tel}'",'',1);
    $tpl->assign('avatar',$user[0]['avatar'] ? $user[0]['avatar'] : TU.'/default.jpg');

    $type = CW('get/type',4);
    $id = CW('get/id',1);
    if($id){
        
        $o = $db->query('sysmessage','',"id='{$id}'",'',1);
        $tpl->assign('data',"<p style='line-height: 25px;margin-top: 10px;'>{$o[0]['content']}</p>");
        //$tpl->compile(basename(__FILE__,'.php'),'');
        if(isphone()){
            $tpl->compile(basename(__FILE__,'.php'),'wap'); return;
        }else{
            $tpl->compile(basename(__FILE__,'.php'),''); return;
        }
    }
    //$type = $type ? $type : '平台通知';
    if($type=='官方消息' || $type=='平台通知'){
        $count = $db->get_count('sysmessage',"mtype='{$type}'");
    }else{
        $count = $db->get_count('sysmessage',"mtype='官方消息' || mtype='平台通知'");
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
            $data .= "<li>
                        <div><a href='{$a}{$article['id']}'>
                            <img src='{$tu}/msg1.png' class='msg1' />
                            <p class='p1'>平台通知</p>
                            <p class='p2 overhid'>{$con}</p>
                            <p class='p3'>{$time}</p></a>
                        </div>
                    </li>";
        }else if($type=='官方消息'){
            $data .= "<li>
                        <div><a href='{$a}{$article['id']}'>
                            <img src='{$tu}/msg2.png' class='msg2' />
                            <p class='p1'>官方消息</p>
                            <p class='p2 overhid'>{$con}</p>
                            <p class='p3'>{$time}</p></a>
                        </div>
                    </li>";
        }else{
            if($article['mtype']=='平台通知'){
                $i = 'msg1';
            }else{
                $i = 'msg2';
            }
            $data .= "<li>
                        <div><a href='{$a}{$article['id']}'>
                            <img src='{$tu}/{$i}.png' class='{$i}' />
                            <p class='p1'>{$article['mtype']}</p>
                            <p class='p2 overhid'>{$con}</p>
                            <p class='p3'>{$time}</p></a>
                        </div>
                    </li>";
        }
    	
    }
    $allurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(stripos($allurl ,"&page=")){
    	$nallurl = substr($allurl,0,stripos($allurl ,"&page="));
    }else{
    	$nallurl = $allurl;
    }
    $pageurl = $nallurl.'&page=';
    $page = functions::page($count,$pagecount,$pageurl);

    $html =  "<img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>Không tập trung~</p>";
    
    $tpl->assign('data',$data ? $data : $html);
    $tpl->assign('page',$page);
if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>