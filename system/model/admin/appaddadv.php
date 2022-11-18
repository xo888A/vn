<?php 
    if(!defined('CW')){exit('Access Denied');}
    
    $db = functions::db();
    
    $tpl =  new Society();
    $id = CW('get/id');
	if($id){
		$adv = $db->query('appadv','',"id='{$id}'",'',1);
	
	    $tpl->assign('positionabs',$adv[0]['positionabs']);
		$tpl->assign('imgcover',$adv[0]['cover']);
        $tpl->assign('remarks',$adv[0]['remarks']);
        $position = $adv[0]['position'];
        $tpl->assign('position',$position);

        if($position=='通用链接'){
            $url = substr($adv[0]['postid'],0,strrpos($adv[0]['postid'],'_'));
            if($adv[0]['click']=='in'){
                $click = '_@';
            }else if($adv[0]['click']=='out'){
                $click = '_@@';
            }
            $postid = $adv[0]['postid'].$click;
        }else{
            $postid = $adv[0]['postid'];
        }
        if($position=='通用链接'){
            $tpl->assign('pos1',"style='display:block'");
        }else if($position=='视频帖子ID' || $position=='微社区帖子ID'){
            $tpl->assign('pos1',"style='display:block'");
        }else if($position=='单页帖子ID'){
            $tpl->assign('pos1',"style='display:block'");
        }else if($position=='推荐话题名称'){
            $tpl->assign('pos1',"style='display:block'");
        }else if($position=='推荐用户ID'){
            $tpl->assign('pos1',"style='display:block'");
        }else{
            $tpl->assign('pos5',"style='display:block'");
        }
        
        
        $tpl->assign('postid',$postid);
        $tpl->assign('content',$adv[0]['content']);
      
        $level = $adv[0]['level'];
        $levels = explode(',',rtrim($level,','));
        foreach ($levels as $level){
            $tpl->assign('l'.$level,'checked');
        }
		$button = "<a href='javascript:;' class='btn submit' rel='appupdateadv'><i class='fa fa fa-edit'></i>更新</a>";
	}else{

	    $button = "<a href='javascript:;' class='btn submit' rel='appaddadv'><i class='fa fa-plus-square-o'></i>添加</a>";
	}
    $tpl->assign('button',$button);
    $tpl->assign('data',$data);
    $tpl->compile('appaddadv','admin'); 
?>