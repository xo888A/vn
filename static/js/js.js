
function up(){
    upload($(this).parent(),$(this).prev("input[mode=upload]"));
}
function upload(form,show){
	$.ajax({
            url:'/webajax.php?mod=upload',
            data: new FormData($(form)[0]),
            type: 'POST',    
            async: true,    
            cache: false,    
            contentType: false,    
            processData: false,
            dataType: 'json',
            success: function (ret) {
            	show.val(ret);
            },
            beforeSend:function(){
                show.val('Đang tải lên, vui lòng đợi...');
            },
            error: function (ret) {  
                show.val('Lỗi tải lên');
            }
        });
}

