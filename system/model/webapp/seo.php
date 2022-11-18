<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
   
    $res = $db->exec('seo','u',array(
        array(
            "seo1"=>CW('post/seo1'),
            'seo2'=>CW('post/seo2'),
            'seo3'=>CW('post/seo3'),
            'seo4'=>CW('post/seo4'),
            'seo5'=>CW('post/seo5'),
            'seo6'=>CW('post/seo6'),
            'seo7'=>CW('post/seo7'),
            'seo8'=>CW('post/seo8'),
            'seo9'=>CW('post/seo9'),
            'seo10'=>CW('post/seo10'),
            'seo11'=>CW('post/seo11'),
            'seo12'=>CW('post/seo12'),
            'seo13'=>CW('post/seo13'),
            'seo14'=>CW('post/seo14'),
            'seo15'=>CW('post/seo15'),
            'seo16'=>CW('post/seo16'),
            'seo17'=>CW('post/seo17'),
        ),array(
            'id'=>1
        )));
   
    msg('Cài đặt thành công!','Xác nhận','','success');
?>