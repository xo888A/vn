<?php 
    if(!defined('CW')){exit('Access Denied');}
    $page = intval(abs(CW('get/page',1)));
    $id = CW('get/id',1);
    $type = CW('get/type');
    $db = functions::db();
    $where = "postid='{$id}' and ishow=1";
    $count = $db->get_count('comments',$where,'id'); 
    $pagecount = ceil($count/APPSIZE);
    $page = $page<1 ? 0 : ($page-1)*APPSIZE;
    $comments = $db->query('comments','',$where,'id desc',"{$page},".APPSIZE);
    $data = '';
    foreach($comments as $comment){
      $time = date('m-d H:i',$comment['ftime']);
      $user = $db->query('users','',"tel='{$comment['tel']}'",'',1);

      if($user[0]['mylevel']){
          //$mylevel = "<img class='tx abs' src='../../../image/vip_{$user[0]['mylevel']}.png'>";
          $level = "<img class='portrait' src='../image/{$user[0]['mylevel']}.png'  />";
      }
      if($user[0]['sex']=='Nam' || !$user[0]['sex']){
          $sex = "<img src='../image/nv.png' class='sex' />";
      }else{
          $sex = "<img src='../image/nan.png' class='sex' />";
      }
      
      $data .= "<li class='comment-wrap'>
            <div class='post'>
              <div class='usermsg rel' tapmode onclick=\"openuser('{$comment['tel']}')\" >
                <p class='fl rel'>
                  <img class='a' src='{$aurl}{$user[0]['avatar']}'>
                  {$sex}
                </p>
                <div class='abs nickname'>
                  <p>{$user[0]['nickname']}{$level}</p>
                </div>
                <div class='abs time'>
                  <p>{$user[0]['address']}</p>
                  <p>{$time}</p>
                </div>
                <p class='clear'></p>
              </div>
              <div class='comment'>
                  <p>{$comment['comments']}</p>
              </div>
            </div>
          </li>";
    }
    if($data){
        echo json_encode(array(
            'data'=>$data,
            'state'=>1
        ));
    }else{
        echo json_encode(array(
            'data'=>'',
            'state'=>1
        ));
    }
    
?>


