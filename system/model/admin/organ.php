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
		$imglists = explode('|',$video[0]['imglist']);
		$nid = 1;
		foreach ($imglists as $img){
			$_id = 'img'.$nid++;
			$tpl->assign($_id,$img);
		}
		$tpl->assign('addparam',$video[0]['addparam'] ? $video[0]['addparam'] : 0);
		$tpl->assign('userid',$video[0]['userid']);
		$tpl->assign('organcover',$video[0]['organcover']);
		$tpl->assign('imglist',$img);
		$tpl->assign('ftime',date('Y-m-d H:i:s',$video[0]['ftime']));
		$tpl->assign('imgcontent',$video[0]['imgcontent']);
		$tpl->assign('addparam',$video[0]['addparam']);
		$tpl->assign('shikan',$video[0]['shikan']);
		$tpl->assign('istuijian',$video[0]['istuijian']);
		$tpl->assign('filesize',$video[0]['filesize']);
		$tpl->assign('downloadurl',$video[0]['downloadurl']);
		$tpl->assign('diamond',$video[0]['diamond'] ? $video[0]['diamond'] : 0);
		$tpl->assign('vipdiam',$video[0]['vipdiam'] ? $video[0]['vipdiam'] : 0);
		$tpl->assign('hot',$video[0]['hot'] ? $video[0]['hot'] : 0);
		$tpl->assign('like',$video[0]['likes'] ? $video[0]['likes'] : 0);
		$topic = explode(',',$video[0]['topic']);
		$d = '';
		foreach ($topic as $val){
			$name = $db->query('topic','name',"id='{$val}'",'',1);
			$d .= $name[0]['name'].'|';
		}
		$d = substr($d,0,strlen($d)-1);
		$tpl->assign('topic',$d);
        $tpl->assign('ishow',$video[0]['ishow']=='1' ? 'Công khai' : 'Kiểm tra');
		$button = "<a href='javascript:;' class='btn submit' rel='updateorgan'><i class='fa fa fa-edit'></i>Cập nhật</a>";
		$level = $video[0]['downlevel'];
        $levels = explode(',',rtrim($level,','));
        foreach ($levels as $level){
            $tpl->assign('l'.$level,'checked');
        }
	}else{
	    $tpl->assign('userid','18888888888');
	    ///////////////
	     $array111 = "前方高能,喵星人,东京猫猫,相合之物,火影忍者,歌愈少女,魔法使黎明期,黑之召唤士,德凯奥特曼,Play热血,漫画改,热播番剧,精品国创,最新综艺,动画,现代科技,汽车,美食,动物圈,英雄联盟,影视剪辑,科普,天官赐福,美妆";
	    $array1 = explode(',',$array111);
	    $array2 = explode(',',$array111);$array3 = explode(',',$array111);
	    $tpl->assign('topic',$array1[array_rand($array1,1)].'|'.$array2[array_rand($array1,1)].'|'.$array3[array_rand($array1,1)]);
	    $tpl->assign('downloadurl','/file.rar');//Tạm thời có thể bị xóa bất cứ lúc nào
	    $v = mt_rand(0,10);
	    if($v){
	        $d = $v-2;
	        if($d<=0){
	            $d=0;
	        }
	    }else{
	        $d=0;
	    }
	    $tpl->assign('addparam',6);
	    $tpl->assign('vipdiam',$d);
	    $tpl->assign('diamond',$v);
	    $ist = mt_rand(1,2);
	    if($ist==1){
	        $rrr = "Có";
	    }else{
	        $rrr = "Không";
	    }
	    $tpl->assign('l0','checked');
	    $tpl->assign('l1','checked');
	    $tpl->assign('l2','checked');
	    $tpl->assign('l3','checked');
	    $tpl->assign('l4','checked');
	    $tpl->assign('l5','checked');$tpl->assign('l6','checked');
	    $tpl->assign('istuijian',$rrr);
	    $tpl->assign('ishow','Công khai');
	    $tpl->assign('filesize',mt_rand(10,100).'M');
	    $tpl->assign('shikan',"https://img1.hitv.com/cms/2022/08/06/U4tyThtVJZBA6AKhn6OT1.jpeg|https://img0.hitv.com/cms/2022/08/08/4XaVrujzqFGHo8qHE9GQc.jpeg|https://img3.hitv.com/cms/2022/08/09/z8gRQkoz4JxTGeN2SuJdV.jpeg|https://3img.hitv.com/preview/sp_images/2022/8/6/shenghuo/461590/17194136/20220806160156758.jpg|https://img3.hitv.com/cms/2022/08/05/PiPatf6AF-5jzBdqvIwfI.jpeg|https://img0.hitv.com/cms/2022/07/26/-Tovg4ERDIxIh113STemR.jpeg");
	    $tpl->assign('imgcontent',"<img src='https://img3.hitv.com/cms/2022/05/09/SnupY1CL-fd2Enc6U77Q3.jpeg' />
	    <img src='https://img0.hitv.com/cms/2022/08/08/4XaVrujzqFGHo8qHE9GQc.jpeg' />
	    <img src='https://img3.hitv.com/cms/2022/08/09/z8gRQkoz4JxTGeN2SuJdV.jpeg' />
	    <img src='https://img1.hitv.com/cms/2022/05/07/aqg8RAhQptZLSLDJwipX9.jpeg' />
	    <img src='https://img0.hitv.com/cms/2022/07/26/-Tovg4ERDIxIh113STemR.jpeg' />
	    <img src='https://img2.hitv.com/cms/2022/07/15/YoZ9yIA_z7kXOp5d95uvL.jpeg' />
	    <img src='https://img4.hitv.com/cms/2022/05/27/dFcJ2X8X6JrWPVAHNzDPu.jpeg' />
	    <img src='https://img3.hitv.com/cms/2022/05/07/c8xxVB4C9MN4F1ngXY2u0.jpeg' />
	    <img src='https://img1.hitv.com/cms/2022/08/06/U4tyThtVJZBA6AKhn6OT1.jpeg' />
	    <img src='https://img4.hitv.com/cms/2022/07/28/iA7tB1bPtKwiAgnfcm75s.jpeg' />
	    ");
	    /////////////
	    //$tpl->assign('diamond',0);
	    $tpl->assign('hot',mt_rand(1000,80000));
		$tpl->assign('like',mt_rand(1000,80000));
	    $button = "<a href='javascript:;' class='btn submit' rel='addorgan'><i class='fa fa-plus-square-o'></i>Thêm</a>";
	}
    $tpl->assign('button',$button);
    $tpl->assign('data',$data);
    $tpl->compile('organ','admin'); 
?>