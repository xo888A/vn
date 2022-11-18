<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tpl =  new Society();
    $db = functions::db();
    $sets =  $db->query('sets','hl1,hl2','id=1');
    $tpl->assign('hl1',$sets[0]['hl1']);
    $tpl->assign('hl2',$sets[0]['hl2']);
    if(functions::is_mobile()){
        $t = CW('get/mod');
        if($t=='index' ){
            $a = 'selected';
            $a_ = '_';
        }elseif($t=='videolist'){
            $b = 'selected';$b_ = '_';
        }elseif($t=='shortvideo' || !$t){
            $c = 'selected';$c_ = '_';
        }elseif($t=='organlist'){
            $d = 'selected';$d_ = '_';
        }elseif($t=='user'){
            $e = 'selected';$e_ = '_';
        }
    
        $tpl->assign('a',$a);
        $tpl->assign('b',$b);
        $tpl->assign('c',$c);
        $tpl->assign('d',$d);
        $tpl->assign('e',$e);
        
        $tpl->assign('_a',$a_);
        $tpl->assign('_b',$b_);
        $tpl->assign('_c',$c_);
        $tpl->assign('_d',$d_);
        $tpl->assign('_e',$e_);

        
        $curname = functions::autocode(CW('cookie/__username'),'-');
        $num1 = $db->get_count('comment2',"tel2='{$curname}' and state=0 and ishow=1");$num1 = $num1 ? $num1 : '';
        $num2 = $db->get_count('htmlcomment2',"tel2='{$curname}' and state=0 and ishow=1");$num2 = $num2 ? $num2 : '';
        $num = intval($num1)+intval($num2);
        if($num>0){
            $sw = "<script>
                    $(function(){
                        $('footer ul li:nth-child(5)').addClass('rel');
                        $('footer ul li:nth-child(5)').append(\"<p class='footernum'>{$num}</p>\")
                    });
                </script>";
        $tpl->assign('sw',$sw);
        }

        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
    
?>