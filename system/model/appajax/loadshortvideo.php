<?php 
    if(!defined('CW')){exit('Access Denied');}
    $id = intval(CW('post/id'));
    
    $tel = CW('post/tel');
    functions::history2($id,$tel);
    $isreload = CW('post/isreload');
    $db = functions::db();
    $follow = CW('post/follow') ? true : false;
    $islike = CW('post/like') ? true : false;
    if($follow){
        $append = "";
    }elseif($islike){
        $append = "";
    }
    
    
    if($isreload && $id){
        $where = "ishow=1 and shortvidurl!='' and id<{$id}";
    }elseif($id){
        $where = "ishow=1 and shortvidurl!='' and id<={$id}";
    }else{
        $where = "ishow=1 and shortvidurl!=''";
    }
    
    // $articles = $db->query('post','',$where,'id desc',3);
    $articles = $db->query('post','',"shortvidurl!=''",'rand()',3);
    $array = array();
    $arr = '';
    
    $lastid = 0;
    foreach($articles as $article){
        $user = $db->query('users','',"tel='{$article['userid']}'",'',1);
        $avatar = $user[0]['avatar'];
        $commentNum = $db->get_count('comments',"postid='{$article['id']}' and ishow=1");
        //$commentNum2 = $db->get_count('comment2',"commentid='{$article['id']}' and ishow=1");
        //$commentNum = $commentNum+$commentNum2;
        $islike = $db->query('likes','',"tel='{$tel}' and postid='{$article['id']}'");
        $isfollow = $db->query('follow','',"tel2='{$article['userid']}' and tel1='{$tel}'");
        $arr = array(
            "vid"=>$article['id'],
            "title"=>$article['title'],
            "thumb"=>$article['shortvidcover'],
            "url"=>$article['shortvidurl'],
            "userInfo"=>array(
                "uid"=> $user[0]['tel'],
                "userName"=>$user[0]['nickname'],
                "avatar"=>$avatar,
                "isLive"=> false,
                "isFocus"=> $isfollow ? true : false,
                "likeNum"=>functions::hot($article['likes']),
                "isLike"=> $islike ? true : false,
                "commentNum"=>$commentNum,
                "shareNum"=> 'Chia sẻ',
            )
        );
        $lastid = $article['id'];
        array_push($array,$arr);
    }
    echo json_encode(array(
        'data'=>$array,
        'lastid'=>$lastid,
        'state'=>1
    ));
?>