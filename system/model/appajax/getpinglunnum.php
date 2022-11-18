<?php
    $db= functions::db();
    $id = CW('post/id');
    $commentNum = $db->get_count('comments',"postid='{$id}' and ishow=1");
    echo json_encode(array(
        'state'=>1,
        'data'=>$commentNum
    ));
?>