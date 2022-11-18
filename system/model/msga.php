<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $curuser = getuser();

    $count = $db->get_count('comment2',"tel2='{$curuser}'  and ishow=1");
    
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    $articles = $db->query('comment2','',"tel2='{$curuser}'  and ishow=1",'id desc',"{$page},".PAGESIZE);
    
    $data = '';
    $tu = TU;
    $img = IMG;
    foreach($articles as $article){
            $time = date('Y.m.d H:i:s',$article['ftime']);
            $u = $db->query('users','',"tel='{$article['tel1']}'",'',1);
            $avatar = $u[0]['avatar'] ? $u[0]['avatar'] : TU.'/default.jpg';
            if($article['state']=='0'){
                $a = "<span class='a1'>Chưa đọc</span>";
            }else if($article['state']=='3'){
                $a = "<span class='a2'>Đã phản hồi</span>";
            }else{
                $a = "<span class='a2'>Đã đọc</span>";
            }
            $addlevel1 = $u[0]['avatar'];
            $addlevel2 = IMG.'/T'.$u[0]['mylevel'].'.png';
            $addlevel3 = IMG.'/'.$u[0]['mylevel'].'.png';
            if($u[0]['viptime']<time()){
                $addlevel2 = INDEX."/image/k.png";//Khung
                $addlevel3 = INDEX."/image/k.png";//Khung
            }
            if(functions::isadmin($u[0]['tel'])){
                $addlevel2 = "{$img}/admin1.png";//Khung
                $addlevel3 = "{$img}/admin2.png";
            }
           
            $postid =$db->query('comments','postid',"id='{$article['commentid']}'");
            $post = $db->query('post','shortvidurl,title,videourl',"id='{$postid[0]['postid']}'");
            
            $nkname = functions::getnickname($u[0]['nickname']);
            if($article['state']=='3'){
                
                if($post[0]['videourl']){
                    $_href = INDEX.'/index.php?mod=video&id='.$postid[0]['postid'];
                }else{
                    $_href = INDEX.'/index.php?mod=organ&id='.$postid[0]['postid'];
                }
                $url = $_href;
            }else{
                $url = INDEX.'/index.php?mod=huifu&id='.$article['id'];
            }
            $comment = strip_tags($article['comment']);
            if($post[0]['shortvidurl']){
                $url="javascript:alert(\"Vui lòng truy cập APP để xem phản hồi video ngắn \");";
            }
            if(isphone()){
                $data .= "<li class='overflow'><a href='$url'>
                <div class='fl  overflow'>
                    <p class='rel fl'>
                        <img class='avatar' src='{$addlevel1}'>
                        <img class='abs' src='{$addlevel2}'>
                    </p>
                    <div class='usermsg '>
                        <span class='abs gettime'>{$time} Bạn đã phản hồi</span>
                        <p class='overhid' style='height:25px'>{$nkname}<img class='level' src='{$addlevel3}'></p>
                        <p class='overhid read'>{$a}{$comment}</p>
                    </div>
                </div></a>
            </li>";
            }else{
                $data .= "<li class='overflow'><a href='$url'>
                        <div class='fl w50 overflow'>
                            <p class='rel fl'>
                                <img class='avatar' src='{$addlevel1}' />
                                <img class='abs' src='{$addlevel2}' />
                            </p>
                            <div class='fl usermsg'>
                                <p>{$nkname}<img class='level' src='{$addlevel3}'/></p>
                                <p>{$time} Bạn đã phản hồi</p>
                            </div>
                        </div>
                        <div class='fr w50 read'>
                            <p class='overhid'>{$a}{$comment}</p>
                        </div></a>
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

    $tpl =  new Society();
    $html =  "";
    $tpl->assign('data',$data ? $data : $html);
    $tpl->assign('page',$page);
    functions::getavatar($tpl);
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>