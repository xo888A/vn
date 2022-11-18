<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Tìm kiếm</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <style>
        .his p.fl{
            font-size:20px;
            font-weight: bold;
        }
        .mt{ 
            margin-top:60px
            
        }
    .his img{
        height:25px;margin-top: -3px;
        
    }
    .his .fl{
        font-size:17px
        
    }
    .level{
        margin-top:10px
        
    }
    .level li{
        width:48.5%;margin-right:3%;margin-bottom:10px;float:left;font-size:15px
        
    }
    .level li:nth-child(2n){
        margin-right: 0;
        
    }
    .level li img{
        height:20px
        
    }
    .level li:nth-child(1)  span,.level li:nth-child(2) span,.level li:nth-child(3) span{
        background: #fff !important;
        
    }
    .level li span{    background: #EDEDED;
    color: #919191;
    display: inline-block;
    border-radius: 4px;
    width: 20px;
    height: 20px;
    line-height: 20px;
    text-align: center;
    font-weight: bold;
    font-size: 12px;
    margin-right: 5px;
    vertical-align: middle;
        
    }
    .mt2{
        margin-top: 10px;
        
    }
    .his .fr{
        font-size:13px
        
    }
    header.public .left {
        z-index: 888;
        
    }
    header.public .left {
        z-index: 888;margin-top:3px;
        
    }
    header{
        border-bottom: 1px solid #ECECEC;
        
    }
    header .top input{
        background: #fff;left: 40px;
        
    }
    header .top .search {
        left: 56px;
        
    }
    .searchs {
   height: 34px !important;
    right: 10px !important;
    top: 10px;
    position: absolute;
    background: #FF7AA5;
    line-height: 29px;
    color: #fff;
    font-weight: normal;
    font-size: 15px;
    padding: 2px 5%;
    border-radius: 4px;
    border: 0;
    
}
    </style>
</head>

<body>
    <header class="public ls">
        <img class="abs left back" src="../image/left_.png" />
        <div class="top">
            <form action="index.php">
            <input type="hidden" name="mod" value="search">

            <input name="keyword" placeholder="Tìm kiếm / Video" style="width: 58%;" />
            <img class="search" src="../image/search.png">
            <button class="abs searchs" type="submit" tapmode="">Tìm kiếm</p>
            <?php echo $this->vars["ttt"] ?>
            </form>
        </div>
      
</header>
    
    <div class="wrap" style=" margin-top: 75px;">
        <div class="his overflow wrap" >
            <p class="fl">Tìm kiếm phổ biến</p>
        </div>
        <div class="wrap">
            <ul class="level overflow data2">
                <?php echo $this->vars["data2"] ?>
            </ul>
        </div>
        <div class="his overflow wrap mt2">
            <p class="fl">Web được đề xuất</p>
        
        </div>
        <div class="public mt15  wrap">
            <ul class="overflow data3">
                <?php echo $this->vars["data3"] ?>
            </ul>
        </div>
    </div>
    <p class="botom"></p>

</body>

</html>
