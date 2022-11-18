
    <header class="wrap">
        <div class="top">
            <form onclick="openform()">
            <input type="hidden" name="mod" value="search">
            <a href="<?php echo INDEX ?>"><img class="logo" src="../image/logo.png" /></a>
            <input name="keyword" placeholder="Tìm kiếm / Video" />
            <img class="search" src="../image/search.png">
            <?php echo $this->vars["ttt"] ?>
            </form>
        </div>
        <ul class="nav">
            <li class="<?php echo $this->vars["a"] ?>"><span></span><a href="<?php echo INDEX ?>">Nhà</a></li>
            <li class="<?php echo $this->vars["c"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=recommend">Đề xuất</a></li>
            <li class="<?php echo $this->vars["e"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=userlist">Blogger</a></li>
            <li class="<?php echo $this->vars["f"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=videolist">Video</a></li>
            <li class="<?php echo $this->vars["g"] ?>"><span></span><a href="<?php echo INDEX ?>/index.php?mod=organlist">chủ đề
</a></li>
            <li><img class="menu" src="<?php echo IMG ?>/menu.png"></li>
            <div class="clear"></div>
        </ul>
        <div class="list hide">
            <p class="category">Danh mục phân loại</p>
            <img src="../image/close.png" class="closecategory" />
            <ul class="overflow">
                <?php echo $this->vars["topic"] ?>
            </ul>
        </div>
    </header>
    <script>
        function openform(){
            window.location.href= window.location.protocol+"//"+window.location.host+"/searchs.html";
        }
    </script>