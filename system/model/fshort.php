<?php 
    if(!defined('CW')){exit('Access Denied');}
    $id = CW('get/id');
    $tpl =  new Society();
    $db = functions::db();
    if($id){
        $where = " and id='{$id}'";
    }else{
        $r_vid = $db->query('post','',"shortvidurl!='' ",' RAND() ',1);
        $id = $r_vid[0]['id'];
//        $where = '';
        $where = " and id='{$id}'";
        
    }
    $vid = $db->query('post','',"shortvidurl!='' {$where}",'id desc',1);
    $tpl->assign('id',$vid[0]['id']);
    $tpl->assign('title',$vid[0]['title']);
    $commentNum = $db->get_count('comments',"postid='{$vid[0]['id']}' and ishow=1");
    // check if login 
    // $tel = getuser();
    $username = functions::autocode(CW('cookie/__username'),'-');
    $tel = "";
    if($username){
      $tel =  $username;

      }
      

    $tpl->assign('tel',$tel);
    $tpl->assign('commentNum',functions::hot($commentNum));
    $tpl->assign('like',functions::hot($vid[0]['likes']));
//     $player = "<script>
//  	    var dplayer = document.getElementById('dplayer');
//         if(dplayer){
//           var dp = new DPlayer({
//                 container: dplayer,
//                 video: {
//                     url: '{$vid[0]['shortvidurl']}',
//                     pic:'{$vid[0]['shortvidcover']}',
// //                    type: 'auto',
// //                    autoplay:true,
//                     type:  'customHls',
//                     customType: {
//                         customHls: function (video, player) {
//                             const hls = new Hls();
//                             hls.loadSource(video.src);
//                             hls.attachMedia(video);
//                         },
//                     },
//                     autoplay:true,
//                     preload: 'auto',
//                     loop: true,
//                     volume: 0.7
//                 }
//             });
//              dp.play();
//         }</script>";
    $player = "<script>
 	    var dplayer = document.getElementById('dplayer');
        if(dplayer){
           var dp = new DPlayer({
                container: dplayer,
                video: {
                    url: '{$vid[0]['shortvidurl']}',
                    pic:'{$vid[0]['shortvidcover']}',
                    // type: 'auto',
                    autoplay:true,
                    preload: 'auto',
                    loop: true,
                    volume: 0.7
                }
            });
            // dp.play();
        }</script>";
//  $player = "    <script>          
//       window.onload = function(){
//         var dp = new DPlayer({
//             container:document.getElementById('dplayer'),
//              autoplay:true,
//              allowfullscreen:true,
// 			 video:{
//                 quality:[{
//                     name:'HD',
//                     url:'{$vid[0]['shortvidurl']}'
//                   },{
//                     name:'SD',
//                     url:'{$vid[0]['shortvidurl']}'
//                 }],
//                 defaultQuality:0
//             }
//         });
//         dp.play();
//     };
//         </script>"      ;      
        
    $tpl->assign('player',$player);
    $biaoqing = $tietu = '';;
    for($i=0;$i<=49;$i++){
        $url = TU.'/img1/'.$i.'.png';
        $biaoqing.= "<li><img src='{$url}'/></li>";
    }
    $tpl->assign('biaoqing',$biaoqing);
    $islikes = array();
    if($tel !="")
      $islikes = $db->query('likes','',"tel='{$tel}' and postid='{$vid[0]['id']}'",'',1);
    
    if($islikes){
        $tpl->assign('likeimg',IMG.'/_icon_like.webp');
        $tpl->assign('likenum',"color:red");
    }else{
        $tpl->assign('likeimg',IMG.'/icon_like.webp');
        $tpl->assign('likenum',"");
    }
    $curid = $id+1;
    $newid = $db->query('post','id',"shortvidurl!=''",'rand()',1);

    $tpl->assign('next',INDEX."/index.php?mod=shortvideo&id=".$newid[0]['id']);
    $tpl->compile(basename(__FILE__,'.php'),'wap');
?>