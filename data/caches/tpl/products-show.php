<?php defined('IN_XQCMS') or exit('Access Denied');?><?php include template('header');?>
<div class="m mid clearfix">
    <div class="m_l">
        <div style="width:250px;">
             <div class="title1"><h2>热门点击 <em>Top Hits</em></h2></div>
              <div class="bboby">
                <ul>
             <?php $arr=lists("moduleid=$moduleid&condition=status=3&pagesize=15&order=hits desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>
              <li class="newslist"><a  
  href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['title'];?></a> </li>
  <?php } } unset($arr);?>	
                </ul>
            </div>
              <?php include template('contact');?>
 
    </div> 
    <!-- s:右1 -->
    <div class="m_r">
        <div class="title1"><span class="fr">当前位置: <a href="<?php echo XQ_PATH;?>">首页</a> &gt;<?php echo cat_pos($catid, ' &gt; ');?> &gt; 案例详情</span><h2>案例详情</h2></div>
              <!--START:内容正文-->
<div class="content-detail">
<h1><?php echo $title;?></h1>
<div class="info">
<span>发布日期：<?php echo date('Y-m-d H:i',$addtime);?>
		点击：<font color="red" id="hits"><?php echo $hits;?></font> 次</span>

</div>

  <?php echo $content;?>


<!--分页--> 
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<div class="catlist_sp">&nbsp;</div>


		<div style="padding-top:10px;">
		<ul>
		<li><strong>上一个：</strong> <?php $arr=lists("moduleid=$moduleid&condition=status=3 and id<$id&pagesize=1&order=id desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?> 
        <a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['alt'];?></a> 
        <?php } } unset($arr);?></li>
		<li><strong>下一个：</strong><?php $arr=lists("moduleid=$moduleid&condition=status=3 and id>$id&pagesize=1&order=id asc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?> 
        <a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['alt'];?></a> 
        <?php } } unset($arr);?> </li>
        </ul>
		</div>
       
</div>
<!--END:内容正文-->
        
    </div> 
    <!-- e:右1 -->
 
</div>
<?php include template('footer');?>