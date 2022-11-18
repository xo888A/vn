<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $page = intval(abs(CW('get/page',1)));
    $count = $db->get_count('activity',"");
    $pagecount = ceil($count/PAGESIZE);
   
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    $articles = $db->query('activity','','','id desc',"{$page},".PAGESIZE);
    $data = '';
    $tu = TU;
    foreach($articles as $article){
        $time1 = date('Y-m-d',$article['time1']);
        $time2 = date('Y-m-d',$article['time2']);
        
        if($article['time2']>time()){
            $tag = "<p class='tag tag1'>Đang tiến hành</p>";
        }else{
            $tag = "<p class='tag tag2'>Đã kết thúc</p>";
        }
        $data .= "<li>
                        {$tag}
                        <a href='javascript:;' onclick='openurl(\"{$article['content1']}\")'><img src='{$article['cover']}' /></a>
                        <div>
                            <div>
                                <p class='hide2'>{$article['title']}</p>
                                <p>{$time1}đến{$time2}</p>
                            </div>
                        </div>
                    </li>";

    	
    }
    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    ));
?>