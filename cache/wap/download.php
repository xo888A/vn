<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Tải xuống</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script src="<?php echo JS ?>/copy.js"></script>
    <script type="text/javascript" src="https://pv.sohu.com/cityjson?ie=utf-8"></script> 
    <style>
        .dw p img{
            height:30px;
            vertical-align: middle;
        }
        .dw img.w100{
            height:400px
        }
        .dw p{
            font-size: 15px;
            color:#fff;
            border: 2px solid #fff;
            border-radius: 7px;
            text-align: center;
            height: 45px;
            line-height: 45px;
            margin-bottom:10px;
        }
        .dw div p:nth-child(1){
            background: #FD79A4;
        }
        .dw div p:nth-child(2){
            background:#2E2E2E;
        }
        .dw div.abs{
            width: 60%;
    left: 20%;
    top: 100px;
        }
        .wrapmessage img{
            max-width: 100%;
        }
    </style>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="dowmload"  style="margin-top:10px">
        <div class="rel dw">
            <div class="abs">
                <p class="download"><img class="android" src="<?php echo IMG ?>/android.png">Tải xuống Android</p>
                <p class="download"><img class="ios" src="<?php echo IMG ?>/ios.png">Tải xuống IPhone</p>
            </div>
            <img class="w100"  src="<?php echo IMG ?>/appbg-m.jpg">
        </div>
        <div class="phone center" >
            <p class="selected" rel="android"><span></span>Hướng dẫn cài đặt Android</p>
            <p rel="ios"><span></span>Hướng dẫn cài đặt IPhone</p>
        </div>
        <p class="card" style="display:none"><?php echo CW('cookie/card');  ?></p>
        <div class="wrapmessage" style="margin-bottom:100px;margin-top:25px">
            <div class="_android">
                <?php echo $this->vars["android"] ?>
            </div>
            <div class="_ios hide">
                <?php echo $this->vars["ios"] ?>
            </div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
    <script>
        $(function(){
            $('.phone p').click(function(){
                var rel = $(this).attr('rel');
                $('.phone p').attr('class','');
                $(this).addClass('selected');
                if(rel=='android'){
                    $('._android').show();
                    $('._ios').hide();
                }else{
                    $('._android').hide();
                    $('._ios').show();
                }
                
            });
        });
    </script>
    <script>
    var ip  = returnCitySN.cip;
    var cid  = returnCitySN.cid;
    var cname  = returnCitySN.cname;
    var card = $('.card').text();
    if(!card){
        card = 'nodata';
    }
    var clipboard = new Clipboard('.download', {
        text: function() {
            return card;
        }
    });
    clipboard.on('success',
    function(e) {
        $.ajax({
    		type: "post",
    		url: "<?php echo INDEX ?>/appajax.php?mod=getshare",
    		dataType: 'html',
    		data: "ip="+ip+"&cid="+cid+"&cname="+cname+"&card="+$('.card').text(),
    		success: function(data){
    		    //window.open("");
    		    window.location.href = "<?php echo $this->vars["downloadurl"] ?>";
            },
    		
       })
    });
    </script>
    
</body>

</html>
