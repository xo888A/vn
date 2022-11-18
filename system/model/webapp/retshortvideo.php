<?php 
    if(!defined('CW')){exit('Access Denied');}
    $page = intval(abs(CW('get/page',1)));
    $id = CW('get/id',1);
    $db = functions::db();
    $where = "postid='{$id}' and ishow=1";
    $count = $db->get_count('comments',$where,'id'); 
    $pagecount = ceil($count/APPSIZE);
    $page = $page<1 ? 0 : ($page-1)*APPSIZE;

    
    $comments = $db->query('comments','',"$where");
    $cms = '';
    if($comments){
    foreach ($comments as $comment){
        
        $comments2 = $db->query('comment2','',"commentid='{$comment['id']}'  and ishow=1",'ftime asc');
        if($comments2){
            foreach ($comments2 as $comment2){
                $tel1 = $db->query('users','tel,avatar,nickname',"tel='{$comment2['tel1']}'");
                $tel2 = $db->query('users','nickname',"tel='{$comment2['tel2']}'");
                $avatarurl2 = INDEX.'/index.php?mod=author&id='.functions::autocode($tel1[0]['tel']);
                $time2 = date('Y-m-d H:i:s',$comment2['ftime']);
                $addcomment .= "<li>
                                    <a href='javascript:;' onclick='openuserindex(\"{$comment2['tel1']}\")'><img class='fl i2' src='{$tel1[0]['avatar']}' /></a>
                                    <div class='fl sh'>
                                        <p class='tt'>{$tel1[0]['nickname']}<span>Trả lời</span>{$tel2[0]['nickname']}<a href='javascript:;' class='fr hfnow' postid='{$id}' tel1='{$us}' nickname='{$tel1[0]['nickname']}' tel2='{$comment2['tel1']}' commentid='{$comment['id']}'>Trả lời</a></p>
                                        <p class='dd'>{$comment2['comment']}</p>
                                        <p class='ii'>{$time2}</p>
                                    </div>
                                    <div class='clear'></div>
                                </li>";
            }
            $addcomment = "<ul class='overflow h'>".$addcomment.'</ul>';
        }else{
            $addcomment = '';
        }
        
        
        
        

        $time = date('Y-m-d H:i:s',$comment['ftime']);
        $comuser = $db->query('users','',"tel='{$comment['tel']}'");
        $avatarurl = INDEX.'/index.php?mod=author&id='.functions::autocode($comment['tel']);
        $nick = $comuser[0]['nickname'] ? $comuser[0]['nickname'] : 'Người dùng chưa biết';
        $cms .= "<div class='overflow m'>
                        <a href='javascript:;' onclick='openuserindex(\"{$comment['tel']}\")'><img class='fl i1' src='{$comuser[0]['avatar']}' /></a>
                        <ul class='fl overflow add'>
                            <li>
                                <p class='t'>{$nick}<a href='#textarea' class='fr hfnow' postid='{$id}' tel1='{$us}' tel2='{$comment['tel']}' nickname='{$nick}' commentid='{$comment['id']}'>回复</a></p>
                                <p class='d'>{$comment['comments']}</p>
                                <p class='i'>{$time}</p>
                                {$addcomment}
                            </li>
                        </ul>
                    </div>";
    }
    }else{
        
        $cms = "<div class='center'><img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>Chưa có bình luận nào~</p></div>";
    }
    
    
    $pinglun = $db->get_count('comments',"postid='{$id}' and ishow=1");


    echo json_encode(array(
        'data'=>$cms,
        'state'=>1
    ));

    
?>


