<?php defined('IN_XQCMS') or exit('Access Denied');?><?php include template('header');?>
<div class="m mid clearfix">
    <div class="m_l">
        <div style="width:250px;">
             <div class="title1"><h2>���ŵ�� <em>Top Hits</em></h2></div>
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
    <!-- s:��1 -->
    <div class="m_r">
        <div class="title1"><span class="fr">��ǰλ��: <a href="<?php echo XQ_PATH;?>">��ҳ</a> &gt;<?php echo cat_pos($catid, ' &gt; ');?> &gt; ��������</span><h2>��������</h2></div>
              <!--START:��������-->
<div class="content-detail">
<h1><?php echo $title;?></h1>
<div class="info">
<span>�������ڣ�<?php echo date('Y-m-d H:i',$addtime);?>
		�����<font color="red" id="hits"><?php echo $hits;?></font> ��</span>

</div>

  <?php echo $content;?>


<!--��ҳ--> 
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<div class="catlist_sp">&nbsp;</div>


		<div style="padding-top:10px;">
		<ul>
		<li><strong>��һ����</strong> <?php $arr=lists("moduleid=$moduleid&condition=status=3 and id<$id&pagesize=1&order=id desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?> 
        <a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['alt'];?></a> 
        <?php } } unset($arr);?></li>
		<li><strong>��һ����</strong><?php $arr=lists("moduleid=$moduleid&condition=status=3 and id>$id&pagesize=1&order=id asc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?> 
        <a href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['alt'];?></a> 
        <?php } } unset($arr);?> </li>
        </ul>
		</div>
       
</div>
<!--END:��������-->
        
    </div> 
    <!-- e:��1 -->
 
</div>
<?php include template('footer');?>