<?php defined('IN_XQCMS') or exit('Access Denied');?><?php include template('header');?>
<div class="m mid clearfix">
    <div class="m_l">
        <div style="width:250px;">
           <?php if(!$catid) { ?>
             <div class="title1"><h2>分类导航 <em>Category Navigation</em></h2></div>
              <div class="bboby">
                <ul>
             <?php $arr=type("moduleid=$moduleid&ismenu=1"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>
              <li class="newslist"><a  
  href="<?php echo $row['url'];?>"><?php echo set_style($row['catname'],$row['color']);?></a> </li>
  <?php } } unset($arr);?>	
                </ul>
            </div>
  <?php } else { ?>
  <div class="title1"><h2>热门点击 <em>Top Hits</em></h2></div>
              <div class="bboby">
                <ul>
             <?php $arr=lists("moduleid=$moduleid&condition=status=3&pagesize=15&order=hits desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>
              <li class="newslist"><a  
  href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['title'];?></a> </li>
  <?php } } unset($arr);?>	
                </ul>
            </div>
  <?php } ?>
              
              <?php include template('contact');?>
 
    </div> 
    <!-- s:右1 -->
    <div class="m_r">
    <div class="title1"><span class="fr">当前位置: <a href="<?php echo XQ_PATH;?>">首页</a> &gt; <?php if($catid) { ?><?php echo cat_pos($catid, ' &gt; ');?><?php } else { ?> <?php echo $MOD['menuname'];?><?php } ?></span><h2><?php if($catid) { ?><?php echo $CAT['catname'];?><?php } else { ?><?php echo $MOD['menuname'];?><?php } ?></h2></div>
    
    <?php if(!$catid) { ?>
     <div class="clear"></div>
     <?php $arr=type("moduleid=$moduleid&ismenu=1"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>
     <?php $i++;?>
           <div class="m_1_<?php if($i%2==0) { ?>r<?php } else { ?>l<?php } ?> mt10">
             <div class="title2"><span class="fr more"><a href="<?php echo $row['url'];?>"><img src="<?php echo XQ_STYLE;?>images/more.jpg" alt=""/></a></span><h2><?php echo set_style($row['catname'],$row['color']);?> <em></em></h2></div>
          <div class="bboby">
                <ul>
                <?php $arr=lists("moduleid=$moduleid&condition=status=3&catid=$row[catid]&pagesize=4&order=listorder desc,addtime desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>
              <li class="newslist"><span class="fr"><?php echo date('m/d',$row['addtime']);?></span> <a  
  href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['title'];?></a> </li>
  <?php } } unset($arr);?>	
                </ul>
            </div>   
      </div>
      <?php } } unset($arr);?>	   
        <?php } else { ?>
        <!--START:正文-->
        <div class="catlist">
           <ul>
<?php $arr=lists("moduleid=$moduleid&condition=status=3&catid=$catid&pagesize=$MOD[pagesize]&kw=$kw&page=$page&showpage=1&update=1&order=listorder desc,addtime desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>
<?php $i++;?>
<li class="catlist_li"><?php if($pcatid) { ?><a href="<?php echo $row['catlink'];?>">[<?php echo $row['catname'];?>]</a><?php } ?> <span class="fr font11"><?php echo date('Y-m-d H:i',$row['addtime']);?></span><a href="<?php echo $row['url'];?>"target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['title'];?></a></li>
<?php if($i%5==0) { ?><li class="catlist_sp">&nbsp;</li><?php } ?>
<?php } } unset($arr);?>		
</ul>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?> 
        </div>	

        <!--END:正文-->
 <?php } ?>       
    </div> 
    <!-- e:右1 -->
 
</div>
<?php include template('footer');?>