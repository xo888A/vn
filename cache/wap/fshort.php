<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Video ngắn</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/flv.min.js"></script>
    <script src="<?php echo JS ?>/hls.min.js"></script>
    <script src="<?php echo JS ?>/DPlayer.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
    <style>
    html,body{
        background: #000;
    }
      .dplayer-controller{
          display: none;
      }
      .fn{
          position: absolute;width:50px;bottom:40px;right:10px;text-align: center;
      }
      .fn img{
          width: 50px;
      }
      .fn p{
              text-align: center;color:#fff;
    font-size: 14px;margin-top:-5px;
    font-weight: bold;
      }
      .next{
          width:40px !important;
      }
      .title{
          font-size: 13px;
    color: #fff;
    left: 15px;
    bottom: 25px;
    width: 75%;
    line-height: 22px;
      }
     
        .pinglun .m{
            margin-bottom:10px}
        .pinglun{
            margin-bottom:70px}
        .ad2{
            margin-top:3px}
    .pinglunwrap{
            bottom: 0;
    left: 0;
    right: 0;
    background: #fff;
    }
    .phonefix {
    height: 45px;
    z-index: 99999999;
    bottom: 0;
    left: 0;
    right: 0;
}
.nd{
    margin-bottom:20px
}
.biaoqing {
    bottom: 106px;
}
    </style>
</head>

<body>
    <!--<?php file::import("system-model-header"); ?>-->
    <div class="vidheight rel">
        <div id="dplayer" class="h100"></div>
        <div class="abs fn">
            <ul>
                <li class="like">
                    <img class="like-img" src="<?php echo $this->vars["likeimg"] ?>" />
                    <p class="likenum" style="<?php echo $this->vars["likenum"] ?>"><?php echo $this->vars["like"] ?></p>
                </li>
                <li class="spinglun">
                    <img src="<?php echo IMG ?>/icon_msg.webp" />
                    <p><?php echo $this->vars["commentNum"] ?></p>
                </li>
                <li>
                    <a href="<?php echo INDEX ?>/index.php?mod=shares">
                    <img src="<?php echo IMG ?>/icon_share.webp" />
                    <p>Chia sẻ</p>
                    </a>
                </li>
            </ul>
            <ul style="margin-top:20px">
                <li>
                    <a href="javascript:;" id="nsmt">
                        <img class="next" src="<?php echo IMG ?>/small_more_speed_selected.png" />
                    <p style="margin-top:5px">Tiếp theo</p>
                    </a>
                </li>
            </ul>
        </div>
        <p class="title abs"><?php echo $this->vars["title"] ?></p>
        <div class="mask hide"></div>
        <div class="pinglunwrap abs">
        <div class="pinglun cms wrap hide"></div>
         <div class="abs w100  phonefix hide">
            <div contentEditable="true"  name="textarea" class="textarea">
               
            </div>
            <div class="bq">
                    <div><p class="control" rel="1"><img class="b c" src="../image/b1.png" /></p><a postid='<?php echo $this->vars["id"] ?>' class="fr fabiao" href="javascript:;" tel2='' commentid=''>Bình luận</a></div>
                </div>
        </div>
        <div class="biaoqing hide">
            <p class="biaoqingindex" style="margin-bottom: 4px;"><a class="biaoqing1" href="javascript:;">Biểu cảm</a></p>
            <ul class="overflow biaoqing2">
                <?php echo $this->vars["biaoqing"] ?>
            </ul>
        </div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
    <script>
        $h1 = $(window).height();
        $h2 = $('.fix.w100').height()+1;
        $(".vidheight").height($h1-$h2);
    </script>
    <?php echo $this->vars["player"] ?>
    
    <script>
        $("#nsmt").click(function(){
            console.info("ok")
            $.ajax({url:"<?php echo INDEX ?>/index.php?mod=short&rand=1",async: false,success:function(data){
                console.info("data="+data)
                var video = {
                    url: data,
                    type: 'auto'
                };
                dp.switchVideo(video)
                $(".dplayer-mobile-play").hide();
                dp.play()
            }});
    
        });
        $(function(){
            var post_flag = false; 
            if(post_flag) return; post_flag = true;
            //alert(JSON.stringify(data));
            $.ajax({
        		type: "get",
        		url: "/appajax.php?mod=retshortvideo",
        		dataType: 'json',
        		data: "id=<?php echo $this->vars["id"] ?>",
        		success: function(data){
                    //$('.message').remove();
                    //$('body').append(data); 
                    $('.cms').html(data.data);
                    post_flag =false;
                },
        		error: function() {
                    post_flag =false;
                }
           })

        });
    </script>
    <script>
    $(function(){
        
            $('.control').click(function(){
                var rel = $(this).attr('rel');
                rel = parseInt(rel);
                if(rel==1){
                    $('.c.b').attr('src',"../image/b2.png");
                    $('.biaoqing').show();
                    $(this).attr('rel',0);
                }else{
                    $('.c.b').attr('src',"../image/b1.png");
                    $('.biaoqing').hide();
                    $(this).attr('rel',1);
                }
            });
            $('.spinglun').click(function(){
                $('.cms,.mask,.phonefix').toggle();
            });
            $('.mask').click(function(){
                $('.cms,.mask,.phonefix').hide();
            });
            $('body').on('click','.hfnow',function(){
                nickname = $(this).attr('nickname');
                $('.textarea').html("<p class='huif'>[回复"+nickname+"]</p>");
                $('.fabiao').text('回复评论');
                $('.fabiao').attr('tel2',$(this).attr('tel2'));
                $('.fabiao').attr('commentid',$(this).attr('commentid'));
                var h = $('.textarea').offset().top;
                $('html,body').stop().animate({
                    scrollTop: h
                },'slow');	
            });
            $('body').on('click','.textarea',function(){
                var content = $('.textarea').text();
                if(content=="[回复"+nickname+"]"){
                    $('.textarea').html("");
                }
            });
            $('body').on('click','.hfnow2',function(){
                nickname = $(this).attr('nickname');
                $('.textarea').html("<p class='huif'>[回复"+nickname+"]</p>");
                $('.fabiao2').text('回复评论');
                $('.fabiao2').attr('tel2',$(this).attr('tel2'));
                $('.fabiao2').attr('commentid',$(this).attr('commentid'));
                var h = $('.textarea').offset().top;
                $('html,body').stop().animate({
                    scrollTop: h
                },'slow');	
            });
            var post_flag = false; 
            $('.like').click(function(){
                if(post_flag) return; post_flag = true;
                //alert(JSON.stringify(data));
                $.ajax({
            		type: "post",
            		url: "/appajax.php?mod=getlike",
            		dataType: 'json',
            		data: "postid=<?php echo $this->vars["id"] ?>&tel=<?php echo $this->vars["tel"] ?>&posttype=shortvideo&type=1",
            		success: function(data){
            		    if(data.err){
            		        alert(data.err);
            		        post_flag =false;
            		        return;
            		    }
            		    if(data.data=='success'){
//            		        alert('操作成功');
                                alert('Đã thêm yêu thích');
            		    }
            		    
                        location.reload();
                        post_flag =false;
                    },
            		error: function() {
                        post_flag =false;
                    }
               })
                
                
                
                
                
            });
            
       
        });
        
        
  </script>
</body>

</html>
