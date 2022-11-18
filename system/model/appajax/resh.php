<?php 
    if(!defined('CW')){exit('Access Denied');}
    $type = CW('gp/type',2);
    if($type=='video'){
        $data = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=rand&num=8&type=video');
    }elseif ($type=='organ') {
        $data = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=rand&num=8&type=organ');
    }elseif($type=='phone'){
        // $t = CW('gp/t');
        // $data = functions::get_contents(INDEX.'/webajax.php?mod=getphonetiezi&num=10&order=rand&type='.$t);
       $t = CW('gp/t');
        $v = CW('gp/dev');

        $data = functions::get_contents(INDEX.'/webajax.php?mod=getphonetiezi&num=10&order=rand&type='.$t.'&dev='.$v);
    }
    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    ));
    
?>