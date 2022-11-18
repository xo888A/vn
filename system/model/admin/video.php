<?php 
    if(!defined('CW')){exit('Access Denied');}
    
    $db = functions::db();
    $topics = $db->query('topic','name');
    $data = '';
    foreach ($topics as $topic){
    	$data .="<li>{$topic['name']}</li>";
    }
    $tpl =  new Society();
    $id = CW('get/id');
	if($id){
		$video = $db->query('post','',"id='{$id}'",'',1);
		$tpl->assign('title',$video[0]['title']);
		$tpl->assign('addparam',$video[0]['addparam'] ? $video[0]['addparam'] : 0);
		$tpl->assign('flag',$video[0]['flag']);
		$tpl->assign('userid',$video[0]['userid']);
		$tpl->assign('videocover',$video[0]['videocover']);
		$tpl->assign('videourl',$video[0]['videourl']);
		$tpl->assign('diamond',$video[0]['diamond'] ? $video[0]['diamond'] : 0);
		$tpl->assign('vipdiam',$video[0]['vipdiam'] ? $video[0]['vipdiam'] : 0);
		$tpl->assign('hot',$video[0]['hot'] ? $video[0]['hot'] : 0);
		$tpl->assign('like',$video[0]['likes'] ? $video[0]['likes'] : 0);
		$tpl->assign('istuijian',$video[0]['istuijian']);
		$tpl->assign('addparam',$video[0]['addparam']);
		$tpl->assign('filesize',$video[0]['filesize']);
		$tpl->assign('downloadurl',$video[0]['downloadurl']);
		$tpl->assign('ftime',date('Y-m-d H:i:s',$video[0]['ftime']));
		$topic = explode(',',$video[0]['topic']);
		$d = '';
		foreach ($topic as $val){
			$name = $db->query('topic','name',"id='{$val}'",'',1);
			$d .= $name[0]['name'].'|';
		}
		$d = substr($d,0,strlen($d)-1);
		$level = $video[0]['downlevel'];
        $levels = explode(',',rtrim($level,','));
        foreach ($levels as $level){
            $tpl->assign('l'.$level,'checked');
        }
		
		$tpl->assign('topic',$d);
        $tpl->assign('ishow',$video[0]['ishow']=='1' ? 'Công khai' : 'Kiểm tra');
		$button = "<a href='javascript:;' class='btn submit' rel='updatevideo'><i class='fa fa fa-edit'></i>Cập nhật</a>";
	}else{
	    
	    ///测试
	    
	   // $tpl->assign('videourl','https://vfx.mtime.cn/Video/2019/03/18/mp4/190318214226685784.mp4');//临时 随时可删
	   // $tpl->assign('downloadurl','/file.rar');//临时 随时可删
	   $tpl->assign('userid','18888888888');//临时 随时可删
	   $tpl->assign('filesize','0M');
	    
	   // $array111 = "前方高能,喵星人,东京猫猫,相合之物,火影忍者,歌愈少女,魔法使黎明期,黑之召唤士,德凯奥特曼,Play热血,漫画改,热播番剧,精品国创,最新综艺,动画,现代科技,汽车,美食,动物圈,英雄联盟,影视剪辑,科普,天官赐福,美妆";
	   // $array1 = explode(',',$array111);
	   // $array2 = explode(',',$array111);$array3 = explode(',',$array111);
	   // $tpl->assign('topic',$array1[array_rand($array1,1)].'|'.$array2[array_rand($array1,1)].'|'.$array3[array_rand($array1,1)]);
	   // $v = mt_rand(0,10);
	   // if($v){
	   //     $d = $v-2;
	   //     if($d<=0){
	   //         $d=0;
	   //     }
	   // }else{
	   //     $d=0;
	   // }
	   // $tpl->assign('addparam',mt_rand(10,30).':'.mt_rand(1,60));
	   // $tpl->assign('vipdiam',$d);
	   // $tpl->assign('diamond',$v);
	   // $ist = mt_rand(1,2);
	   // if($ist==1){
	   //     $rrr = "是";
	   // }else{
	   //     $rrr = "否";
	   // }
	   // $tpl->assign('l0','checked');
	   // $tpl->assign('l1','checked');
	   // $tpl->assign('l2','checked');
	   // $tpl->assign('l3','checked');
	   // $tpl->assign('l4','checked');
	   // $tpl->assign('l5','checked');$tpl->assign('l6','checked');
	   // $tpl->assign('istuijian',$rrr);
	   // $tpl->assign('ishow','公开');
	    ///////////////////
	    $tpl->assign('hot',mt_rand(1000,80000));
		$tpl->assign('like',mt_rand(1000,80000));
	    $button = "<a href='javascript:;' class='btn submit' rel='addvideo'><i class='fa fa-plus-square-o'></i>Thêm</a>";
	}
    $tpl->assign('button',$button);
    $tpl->assign('data',$data);
    $tpl->compile('video','admin'); 
?>