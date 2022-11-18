<?php
    $id = CW('post/id');
    $db = functions::db();
    $html = $db->query('html','',"id='{$id}'",'',1);
    $pinglun = $db->get_count('htmlcomments',"postid='{$id}' and ishow=1");
    $comments = $db->query('htmlcomments','',"postid='{$id}'  and ishow=1");
    $cms = '';
    if($comments){
    foreach ($comments as $comment){
        
        $comments2 = $db->query('htmlcomment2','',"commentid='{$comment['id']}'  and ishow=1");
        if($comments2){
            foreach ($comments2 as $comment2){
                //////////////////////////////
                $addlevel1 = $addlevel2 = $_addlevel1 ='';
                $tel1 = $db->query('users','mylevel,tel,avatar,nickname',"tel='{$comment2['tel1']}'");
                $tel2 = $db->query('users','mylevel,tel,nickname',"tel='{$comment2['tel2']}'");
                if($tel1[0]['mylevel']){
                    $tu = IMG;
                    $addlevel1 = "<img class='addlevel1' src='{$tu}/{$tel1[0]['mylevel']}.png'>";
                    $addlevel2 = "<img class='addlevel3' src='{$tu}/T{$tel1[0]['mylevel']}.png'>";
                }
                if($tel2[0]['mylevel']){
                    $_addlevel1 = "<img class='addlevel1' src='{$tu}/{$tel2[0]['mylevel']}.png'>";
                }
                $avatarurl2 = INDEX.'/index.php?mod=author&id='.functions::autocode($tel1[0]['tel']);
                $time2 = date('Y-m-d H:i:s',$comment2['ftime']);//<img src='../image/T6.png' class='level' />
                $n1 = functions::getnickname($tel1[0]['nickname']);
                $n2 = functions::getnickname($tel2[0]['nickname']);
                
                if(functions::isadmin($tel1[0]['tel'])){
                    $addlevel2 = "<img class='addlevel3' src='{$tu}/admin1.png'>";
                    $addlevel1 = "<img class='addlevel1' src='{$tu}/admin2.png'>";
                }
                if(functions::isadmin($tel2[0]['tel'])){
                    $_addlevel1 = "<img class='addlevel1' src='{$tu}/admin2.png'>";
                   
                }
               ///////////////////////
                $addcomment .= "<li>
                                    
                                    <a href='javascript:;' class='ipblock'><img class='fl i2' src='{$tel1[0]['avatar']}' />{$addlevel2}</a>
                                    <div class='fl sh'>
                                        <p class='tt'>{$n1}{$addlevel1}<span>回复</span>{$n2}{$_addlevel1}<a href='javascript:;' class='fr hfnow2' postid='{$id}' tel1='{$us}' tel2='{$comment2['tel1']}'   nickname='{$tel1[0]['nickname']}' commentid='{$comment['id']}'>回复</a></p>
                                        <p class='dd'>{$comment2['comment']}</p>
                                        <p class='ii'>{$time2}</p>
                                    </div>
                                    <div class='clear'></div>
                                </li>";
            }
            $addcommentsss = "<ul class='overflow h'>".$addcomment.'</ul>';
        }else{
            $addcommentsss = '';
        }
        

        /////////////////////
        $time = date('Y-m-d H:i:s',$comment['ftime']);
        $comuser = $db->query('users','',"tel='{$comment['tel']}'");
        $avatarurl = INDEX.'/index.php?mod=author&id='.functions::autocode($comment['tel']);
        $nick = $comuser[0]['nickname'] ? $comuser[0]['nickname'] : '未知用户';
        $addlevel1 = $addlevel2 = '';
        if($comuser[0]['mylevel']){
            $tu = IMG;
            $addlevel1 = "<img class='addlevel1' src='{$tu}/{$comuser[0]['mylevel']}.png'>";
            $addlevel2 = "<img class='addlevel2' src='{$tu}/T{$comuser[0]['mylevel']}.png'>";
        }
        $n3 = functions::getnickname($comuser[0]['nickname']);
        if(functions::isadmin($comuser[0]['tel'])){
            $addlevel2 = "<img class='addlevel2' src='{$tu}/admin1.png'>";
            $addlevel1 = "<img class='addlevel1' src='{$tu}/admin2.png'>";
        }
        ////////////////////////
        $cms .= "<div class='overflow m'>
                        <a href='javascript:;'  class='ipblock'><img class='fl i1' src='{$comuser[0]['avatar']}' />{$addlevel2}</a>
                        <ul class='fl overflow add'>
                            <li>
                                <p class='t'>{$n3}{$addlevel1}<a href='javascript:;' class='fr hfnow2' postid='{$id}' tel1='{$us}' tel2='{$comment['tel']}' nickname='{$nick}' commentid='{$comment['id']}'>回复</a></p>
                                <p class='d'>{$comment['comments']}</p>
                                <p class='i'>{$time}</p>
                                {$addcommentsss}
                            </li>
                        </ul>
                    </div>";
    }
    }else{
        $tu = TU;
        $cms = "<img class='nodata' src='../image/nodata.png'><p class='center nd'>暂无评论哦~</p>";
    }
    $biaoqing = $tietu = '';;
    for($i=0;$i<=49;$i++){
        $url = TU.'/img1/'.$i.'.png';
        $biaoqing.= "<li><img src='{$url}'/></li>";
    }
    for($i=0;$i<=29;$i++){
        $url = TU.'/img2/a'.$i.'.png';
        $tietu.= "<li><img src='{$url}'/></li>";
    }
    echo json_encode(array(
        'state'=>1,   
        'cms'=>$cms,
        'biaoqing'=>$biaoqing,
        'tietu'=>$tietu,
        'name'=>$html[0]['name'],
        'content'=>$html[0]['content'],
        'pinglun'=>$pinglun
    ));
?>