<?php
        if(CW('get/card')){
            $share = INDEX.'/?card='.CW('get/card');
            echo functions::qrcode($share);
        }else{
            $card = CW('cookie/card');
            if($card){
                $share = INDEX.'/index.php?mod=download&card='.$card;
            }else{
                $share = INDEX.'/index.php?mod=download';
            }
            echo functions::qrcode($share);
        }
        
?>