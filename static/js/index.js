$(function(){
    $('.returntop').click(function(){
    	$('html,body').stop().animate({scrollTop: 0},'slow');	
    });
    $('header .show').click(function(){
        if($('header .type').is(":visible")){
            $('header .type').hide();
        }else{
            $('header .type').show();
        }
    });
    $('._reg').click(function(){
        const usr_input = document
		.getElementById("submit-cap");
            

        if ( usr_input &&  usr_input.value != captcha.innerHTML) {
            
            alert('Sai mã xác nhận');
            generatec();
            return false;
        }
        ajax($(this).attr('rel'), $('.fm input').serialize());
    });
    $('.buyvideo').click(function(){
        if(confirm('Vui lòng xác nhận lại xem có mua không?')){
            ajax('buyvideo',"id="+$(this).attr('rel'));
        }
    });
    $('.delid').click(function(){
        if(confirm('Xác nhận xóa?')){
            ajax('delpost',"id="+$(this).attr('rel')+"&tel="+$(this).attr('tel'));
        }
    });
    
    
    $('.followuser').click(function(){
        window.user = $(this).attr("user");
        user = "user_"+user;
        ajax('guanzhu',"user="+ $(this).attr("user"));
    });
    
    $('.clearred').click(function(){
       // if(confirm('Vui lòng xác nhận xóa lịch sử xem hay không?')){
        ajax('clearred');
        //}
    });
    



    
    $('.lgin').click(function(){

        const usr_input = document
		.getElementById("submit-cap");
            

        if ( usr_input &&  usr_input.value != captcha.innerHTML) {
            
            alert('Sai mã xác nhận');
            generatec();
            return false;
        }

        //alert(JSON.stringify($('input').serialize()));
        $.ajax({
        		type: "post",
        		url: "/webajax.php?mod=lgin",
        		dataType: 'json',
        		data: $('.fm input').serialize(),
        		success: function(data){
        		    if(data.data){
        		        window.location.href= window.location.protocol+"//"+window.location.host;
        		    }else{
        		        alert(data.err);
        		    }
                    
                    post_flag =false;
                },
        		error: function() {
                    post_flag =false;
                }
           })
    });
    
    $('.logout').click(function(){
        if(confirm('Xác nhận đăng xuất?')){
            $.ajax({
        		type: "post",
        		url: "/webajax.php?mod=lgout",
        		dataType: 'json',
        		data: '',
        		success: function(data){
                    alert('Tài khoản đăng xuất thành công');
                    location.reload();
                    post_flag =false;
                },
        		error: function() {
                    post_flag =false;
                }
           })
        }
        
    });
    var nickname;
    $('.fabiao').click(function(){
        var content = $('.textarea').html();
        if($('.textarea').text()=="[Trả lời"+nickname+"]"){
            return;
        }
        var postid = $(this).attr('postid');
        var tel2 = $(this).attr('tel2');
        var commentid = $(this).attr('commentid');
        if(!content){return;}

        if(tel2==undefined){
            tel2 = '';
        }
        if(commentid==undefined){
            commentid = '';
        }
        
        $.ajax({
        		type: "post",
        		url: "/webajax.php?mod=pinglun",
        		dataType: 'json',
        		data: "pinglun="+content+"&postid="+postid+"&tel2="+tel2+"&commentid="+commentid,
        		success: function(data){
        		    if(data.err){
        		        alert(data.err);
        		        
        		    }else{
        		        alert(data.data);
        		        location.reload();
        		    }
                    post_flag =false;
                },
        		error: function() {
                    post_flag =false;
                }
           })
    });
    var nickname;
    $('.fabiao2').click(function(){
        var content = $('.textarea').html();
        if($('.textarea').text()=="[Trả lời"+nickname+"]"){
            return;
        }
        var postid = $(this).attr('postid');
        var tel2 = $(this).attr('tel2');
        var commentid = $(this).attr('commentid');
        if(!content){return;}

        if(tel2==undefined){
            tel2 = '';
        }
        if(commentid==undefined){
            commentid = '';
        }
        
        $.ajax({
        		type: "post",
        		url: "/webajax.php?mod=htmlpinglun",
        		dataType: 'json',
        		data: "pinglun="+content+"&postid="+postid+"&tel2="+tel2+"&commentid="+commentid,
        		success: function(data){
        		    if(data.err){
        		        alert(data.err);
        		        
        		    }else{
        		        alert(data.data);
        		        location.reload();
        		    }
                    post_flag =false;
                },
        		error: function() {
                    post_flag =false;
                }
           })
    });
    
    
    
    $('.hfnow').click(function(){
        nickname = $(this).attr('nickname');
        $('.textarea').html("<p class='huif'>[Trả lời"+nickname+"]</p>");
        $('.fabiao').text('Trả lời bình luận');
        $('.fabiao').attr('tel2',$(this).attr('tel2'));
        $('.fabiao').attr('commentid',$(this).attr('commentid'));
        var h = $('.textarea').offset().top;
        $('html,body').stop().animate({scrollTop: h},'slow');	
    });
    $('.textarea').click(function(){
        var content = $('.textarea').text();
        if(content=="[Trả lời"+nickname+"]"){
            $('.textarea').html("");
        }
    });
    $('.hfnow2').click(function(){
        nickname = $(this).attr('nickname');
        $('.textarea').html("<p class='huif'>[Trả lời"+nickname+"]</p>");
        $('.fabiao2').text('Trả lời bình luận');
        $('.fabiao2').attr('tel2',$(this).attr('tel2'));
        $('.fabiao2').attr('commentid',$(this).attr('commentid'));
        var h = $('.textarea').offset().top;
        $('html,body').stop().animate({scrollTop: h},'slow');	
    });
    $('.textarea').click(function(){
        var content = $('.textarea').text();
        if(content=="[Trả lời"+nickname+"]"){
            $('.textarea').html("");
        }
    });
    $('.xq').click(function(){
        var data = $(this).attr('data');
        alert(data);
    });
    
    $('.biaoqing2 img').click(function(){
        var content = $('.textarea').html();
        var val = content+"<img src='"+$(this).attr('src')+"' />";
        $('.textarea').html(val);
    });
    $('.tietu2 img').click(function(){
        var content = $('.textarea').html();
        var isexist = $('.textarea .tietus').attr('src');
        var val;
        if(isexist){
            $('.textarea .tietus').attr('src',$(this).attr('src'));
        }else{
            val = "<img class='tietus' src="+$(this).attr('src')+" />"+content;
        }
        $('.textarea').html(val);
    });
    $('.biaoqing1').click(function(){
        $('.biaoqing2').show();
        $('.tietu2').hide();
    });
    $('.tietu').click(function(){
        $('.biaoqing2').hide();
        $('.tietu2').show();
    });
    $("body").on('click', '.closezip',function(){
        //$('.downloadzip').hide();
        $('.downloadzip').remove();
    });
    $("body").on('click', '.closealert',function(){
        $('.win').hide();$('.win2').hide();
    });
    $("body").on('click', '.openinstros',function(){
        $('.downloadzip').hide();
        $('.win2').show();
    });
    $('.liked').click(function(){
        ajax('organlike',"id="+$(this).attr("rel"));
    });
    $('.liked2').click(function(){
        ajax('videolike',"id="+$(this).attr("rel"));
    });
    $('.nickname').click(function(){
        ajax('webupdateuser',"type=nickname&val="+$("input[name=nickname]").val());
    });
    $('.sexs').click(function(){
        ajax('webupdateuser',"type=sex&val="+$("input[name=sex]").val());
    });
    $('.descs').click(function(){
        //var img = $('input[name=simg]').val();
        //if(img){
            ajax('webupdateusers');
        //}else{
                // $.ajax({
                //     url:'/webajax.php?mod=webupdateuserses',
                //     data: new FormData(document.getElementById("files")),
                //     type: 'POST',    
                //     async: true,    
                //     cache: false,    
                //     contentType: false,    
                //     processData: false,    
                //     success: function (data) {
                //         alert('Cập nhật thành công');
                //         location.reload();
                //     },
                //     error: function (ret) {  
                        
                //     }
                // });
        //}
    });
    $('.withdrawalspass').click(function(){
        ajax('webupdateuser',"type=withdrawalspass&val="+$("input[name=withdrawalspass]").val());
    });
    $('.updatepassword').click(function(){
        ajax('updatepassword',"pass1="+$("input[name=pass1]").val()+"&pass2="+$("input[name=pass2]").val()+"&pass3="+$("input[name=pass3]").val());
    });
    $('.alltixian').click(function(){
        $("input[name=wallet]").val($('.nowmoney').text());
    });
    $('.wallettixian').click(function(){
        ajax('wallettixian');
    });
    $('.covertcardbtn').click(function(){
        var val = $('.covertcard').val();
        ajax('covertcard',"card="+val);
    });
    $('.qiandao').click(function(){
        ajax('signinday');
    });
    $('.findpass').click(function(){
        $('.findpass a').text('Đang gửi vui lòng đợi...');
        ajax('findpass');
    });
    $('.fl.fls .u').click(function(){
        window.location.href= window.location.protocol+"//"+window.location.host+"/index.php?mod=set";
    });
    $('.send').click(function(){
        
        $('input[name=email]').attr('readonly','readonly');
        ajax('sendemail');
    });
    $('.sendemail').click(function(){
        ajax('updatee');
    });
    $('.godown').click(function(){
        //$('.downloadzip').show();
        ajax('godown',"id="+$(this).attr('rel'));
    });
});
var post_flag = false; 
function ajax(target,data){
    if(post_flag) return; post_flag = true;
    if(data){
    	data = data;
    }else{
    	data = $('input,textarea,select').serialize();
    }
    //alert(JSON.stringify(data));
    $.ajax({
		type: "post",
		url: "/webajax.php?mod="+target,
		dataType: 'json',
		data: data,
		success: function(data){
            //$('.message').remove();
            //$('body').append(data); 
            if(data.data){
                if(data.do=='reload'){
                    alert(data.data);
                    location.reload();
                }else if(data.do=='goindex'){
                    alert(data.data);
                    window.location.href= window.location.protocol+"//"+window.location.host;
                }else if(data.do=='follow'){
                    var element = "."+user;
                    //$tpl->assign('guanzhu',"<a href='javascript:;' class='guanzhu1' user='{$post[0]['userid']}'>Theo dõi</a>");
                    if(data.data=='removefollow'){
                        $(element).text('Theo dõi');
                        $(element).attr('style',"background: #FF7AA5");
                        var num = parseInt($('.newfs').text())-1;
                        $('.newfs').text(num);
                        
                        var fs = parseInt($('.fs').text())-1;
                        $('.fs').text(fs);
                    }else if(data.data=='follow'){
                        $(element).text('Đã theo dõi');
                        $(element).attr('style','background: #ccc');
                        var num = parseInt($('.newfs').text())+1;
                        $('.newfs').text(num);
                        
                        var fs = parseInt($('.fs').text())+1;
                        $('.fs').text(fs);
                    }
                }else if(data.do=='like'){
                    if(data.data=='cancel'){
                        $('.liked').attr('src','./static/img/web/m1.png');
                        if($('.liked_num2').text().search('.')!=-1){
                            return;
                        }
                        var num = parseInt($('.liked_num2').text())-1;
                        $('.liked_num2').text(num);
                    }else if(data.data=='add'){
                        $('.liked').attr('src','./static/img/web/m1_.png');
                        if($('.liked_num2').text().search('.')!=-1){
                            return;
                        }
                        var num = parseInt($('.liked_num2').text())+1;
                        $('.liked_num2').text(num);
                    }
                }else if(data.do=='like2'){
                    if(data.data=='cancel'){
                        if(isMobile()){
                            $('.liked2').attr('src','../image/y1.png');//pc
                        }else{
                            $('.liked2').attr('src','./static/img/web/vv1.png');//pc
                        }
                        if($('.liked_num2').text().search('.')!=-1){
                            return;
                        }
                        var num = parseInt($('.liked_num2').text())-1;
                        $('.liked_num2').text(num);
                    }else if(data.data=='add'){
                        $('.liked2').attr('src','./static/img/web/m1_.png');
                        if($('.liked_num2').text().search('.')!=-1){
                            return;
                        }
                        var num = parseInt($('.liked_num2').text())+1;
                        $('.liked_num2').text(num);
                    }
                }else if(data.do=='updateuser'){
                    alert(data.data);
                    location.reload();
                }else if(data.do=='updateuserpass'){
                    alert(data.data);
                    window.location.href= window.location.protocol+"//"+window.location.host+"/login.html";
                }else if(data.do=='tx'){
                    alert(data.data);
                    location.reload();
                }else if(data.do=='covert'){
                    alert(data.data);
                    location.reload();
                }else if(data.do=='qiandao'){
                    alert(data.data);
                    location.reload();
                }else if(data.do=='receive'){
                    $('.findpass a').text('Lấy lại mật khẩu');
                    alert(data.data);
                }else if(data.do=='pay'){
                    alert(data.data);
                    window.location.href = data.url;
                }else if(data.do=='download'){
                    $("body").append(data.data);
                }else if(data.do=='delid'){
                    if(data.res=='success'){
                        alert('Đã xóa!');
                        location.reload();
                    }else{
                        alert('Xóa thất bại!');
                        location.reload();
                    }
                }
            }else{
                if(data.err=='nopay'){
                    alert('Bạn có một đơn hàng chưa thanh toán, hãy nhấp để thanh toán!');
                    window.location.href = data.url;
                    return;
                }
                if(data.err.indexOf("请先登录")>=0){
                    alert(data.err);
                    window.location.href= window.location.protocol+"//"+window.location.host+"/login.html";
                }else{
                    alert(data.err);
                }
                
                var _d = $('.findpass a');
                if(_d){
                    _d.text('Lấy lại mật khẩu');
                }
                
            }
            post_flag =false;
        },
		error: function() {
            post_flag =false;
        },
        beforeSend: function() {
            
        }
   })
}
function isMobile() {
            var userAgentInfo = navigator.userAgent;
 
            var mobileAgents = [ "Android", "iPhone", "SymbianOS", "Windows Phone", "iPad","iPod"];
 
            var mobile_flag = false;
 
            //根据userAgent判断是否是手机
            for (var v = 0; v < mobileAgents.length; v++) {
                if (userAgentInfo.indexOf(mobileAgents[v]) > 0) {
                    mobile_flag = true;
                    break;
                }
            }
             var screen_width = window.screen.width;
             var screen_height = window.screen.height;   
 
             //根据屏幕分辨率判断是否是手机
             if(screen_width < 500 && screen_height < 800){
                 mobile_flag = true;
             }
 
             return mobile_flag;
        }