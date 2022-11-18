<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title> Toàn bộ Video</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="../script/swiper.js"></script>
    
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="swiper wrap overflow  swiperlbss">
        <div class="swiper-wrapper">
            
            <?php echo $this->vars["vlist"] ?>
        </div>
    </div>
    <div class="index  wrap overflow swiper">
        <div class="swiper-wrapper">
            <?php echo $this->vars["adv1"] ?>
        </div>
        <div class="i swiper-pagination"></div>
    </div>
    
    <div class="wrap" style="margin-top:20px">
        <div class="index-adv  overflow adv3" style="margin-top:0">
            <p>
                <a href='<?php echo INDEX ?>/index.php?mod=userlist'><img src='../image/jinpaizuozhe.jpg' /></a>
                <span>Blogger Vàng</span>
            </p><p>
                <a href='<?php echo INDEX ?>/index.php?mod=vip' ><img src='../image/xuanzewanfa.jpg' /></a>
                <span>Nạp tiền VIP</span>
            </p><p>
                <a href='<?php echo INDEX ?>/index.php?mod=message&type=平台通知'><img src='../image/zhuantiguidang.jpg' /></a>
                <span>Thông báo của App</span>
            </p><p>
                <a href='<?php echo INDEX ?>/index.php?mod=app'><img src='../image/tuijianapp.jpg' /></a>
                <span>Đề xuất của APP</span>
            </p>
        </div>
    </div>
    <p class="line"></p>


    <ul class="publicul  mt15" id="content">
        <?php echo $this->vars["data"] ?>
    </ul>
    
    
    <link rel="stylesheet" href="/static/h5/dropload.css">
    <script src="/static/h5/dropload.min.js"></script>
    <script>
        $(function(){
    var paging = 1;//页码数
    // dropload函数接口设置
    $('#content').dropload({
        scrollArea : window,
        domDown : {
            domClass   : 'dropload-down',
            // 滑动到底部显示内容
            domRefresh : '<div class="dropload-refresh">↑上拉加载更多</div>',
            // 内容加载过程中显示内容
            domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>',
            // 没有更多内容-显示提示
            domNoData  : '<div class="dropload-noData">暂无数据</div>'
        },
        //上拉加载更多 回调函数
        loadDownFn : function(me){
            paging++; // 每次请求，页码加1
            $.ajax({
                type: 'GET',
                url: '/index.php?mod=videolist&page='+paging,
                success: function(data){
                    if(data){
                        $('#content').append(data);
                        me.resetload();
                    }else{
                        me.lock();
                        me.noData();
                    }
                },
                // 加载出错
                error: function(xhr, type){
                    // 即使加载出错，也得重置
                    me.resetload();
                }
            });
        },
        threshold : 50
    });
});

        
    </script>
    
    
    <!--<?php echo $this->vars["page"] ?>-->
    <p class="botom"></p>
    <?php file::import("system-model-footer"); ?>
    <script>
        var swiper = new Swiper('.index', {
          pagination: {
            el: '.i.swiper-pagination',
          },
          direction:'horizontal',
          loop: true,
          autoplay:true,
          speed:1000,
        });
        var swiper = new Swiper(".indexadv", {
            observer:true,
             observeParents:true,
             slidesPerView: 'auto',
             freeMode : true,
             freeModeFluid : true,
             spaceBetween: 10,
         });
         var swiper = new Swiper(".swiperlbss", {
            slidesPerView: 'auto',
            observer:true,
            observeParents:true,
            freeMode : true,
            freeModeFluid : true,
            spaceBetween: 10,
         });

    </script>
</body>

</html>
