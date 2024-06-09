<?php defined('IN_XQCMS') or exit('Access Denied');?><?php include template('header');?>
<div class="m mid clearfix">
    <div class="m_l">
        <div style="width:250px;">
             <div class="title1"><h2>案例分类 <em>Case classification</em></h2></div>
              <div class="bboby">
                <ul>
             <?php $arr=type("moduleid=$moduleid&ismenu=1"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>
              <li class="newslist"><a  
  href="<?php echo $row['url'];?>"><?php echo set_style($row['catname'],$row['color']);?></a> </li>
  <?php } } unset($arr);?>	
                </ul>
            </div>
              <?php include template('contact');?>
 
    </div> 
    <!-- s:右1 -->
    <div class="m_r">
    <div class="title1"><span class="fr">当前位置: <a href="<?php echo XQ_PATH;?>">首页</a> &gt; <?php if($catid) { ?><?php echo cat_pos($catid, ' &gt; ');?><?php } else { ?> <?php echo $MOD['menuname'];?><?php } ?></span><h2><?php if($catid) { ?><?php echo $CAT['catname'];?><?php } else { ?><?php echo $MOD['menuname'];?><?php } ?></h2></div>
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
        
    </div> 
    <!-- e:右1 -->
 
</div>
<?php include template('footer');?>