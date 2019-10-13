<?php
include "sql.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0055)?do=meg -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>卓越科技大學校園資訊系統</title>
<link href="./news_files/css.css" rel="stylesheet" type="text/css">
<script src="./news_files/jquery-1.9.1.min.js"></script>
<script src="./news_files/js.js"></script>
</head>

<body>
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>
<iframe style="display:none;" name="back" id="back"></iframe>
<div id="main" style="overflow: scroll;margin: 10px auto;padding: 0;border: 0;">
	<a title="<?=$t3txt?>" href="index.php"><div class="ti" title="<?=$t3txt?>" style="background:url('upload/<?=$t3img?>'); background-size:cover;"></div><!--標題--></a>
        	<div id="ms">
             	<div id="lf" style="float:left;">
            		<div id="menuput" class="dbor">
                    <!--主選單放此-->
					<span class="t botli">主選單區</span><?=$t12menu?>
                                                </div>
                    <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    	<span class="t">進站總人數 : 
						<?=$t7num?>                      </span>
                    </div>
        		</div>
                <div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
                	                     <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
										 <?=$t4ma?>    </marquee>
                    <div style="height:32px; display:block;"></div>
<span class="t botli">更多最新消息顯示區</span>
<?php
$nw=(empty($_GET['page'])?1:$_GET['page']);
$bg=($nw-1)*3;
$re=select("t9_news","dpy=1 limit ".$bg.",5");
$t9all='';
foreach ($re as $ro) $t9all.='<li>'.mb_substr($ro['text'],0,15).'<span class="all" style="display:none">'.$ro['text'].'</span></li>';
?>
<ol class="ssaa" style="list-style-type:decimal;" start=<?=$bg+1?>>
<?=$t9all?>
</ol>
															
<?php
$re=page("t9_news","dpy=1",3,$nw);
foreach ($re as $key => $value) {
    if($key==$nw) echo '<a class="bl" style="font-size:60px;" href="?page='.$value.'">'.$key.'</a>';
    else echo '<a class="bl" style="font-size:30px;" href="?page='.$value.'">'.$key.'</a>';
}
?>
	                </div>
<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 300px; left: 500px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
$(".ssaa li").hover(
function ()
{
$("#altt").html("<pre>"+$(this).children(".all").html()+"</pre>")
$("#altt").show()
}
)
$(".ssaa li").mouseout(
function()
{
$("#altt").hide()
}
)
</script>
                                 <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                	<!--右邊-->   
                	<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;admin.php&#39;)">管理登入</button>
                	<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>
						<div style="padding:10px 20px" class="cent">
							<img src="img/01E01.jpg" onclick="pp(1)">
							<?=$t6img?>
							<img src="img/01E02.jpg" onclick="pp(2)">
						</div>
						                        <script>
							// var nowpage=0,num=0;
							var nowpage=0,num=<?=$t6num?>;
							function pp(x)
							{
								var s,t;
								if(x==1&&nowpage-1>=0)
								{nowpage--;}
								if(x==2&&(nowpage+1)<=num-3)
								{nowpage++;}
								$(".im").hide()
								for(s=0;s<=2;s++)
								{
									t=s*1+nowpage*1;
									$("#ssaa"+t).show()
								}
							}
							pp(1)
                        </script>
                    </div>
                </div>
                            </div>
             	<div style="clear:both;"></div>
            	<div style="left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
                	<span class="t" style="line-height:123px;"><?=$t8txt?></span>
                </div>
    </div>

</body></html>