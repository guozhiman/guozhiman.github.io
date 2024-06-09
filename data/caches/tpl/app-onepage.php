<?php defined('IN_XQCMS') or exit('Access Denied');?><?php include template('header');?>
<div class="m mid clearfix">
    <div class="m_l">
        <div style="width:250px;">
            <div class="title1"><h2>体系认证 <em>System certification</em></h2></div>
              <div class="bboby">
                <ul>
             <?php $arr=type("moduleid=10&catid=11&ismenu=1"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>
              <li class="newslist"><a  
  href="<?php echo $MODULE['10']['url'];?><?php echo $row['url'];?>"><?php echo set_style($row['catname'],$row['color']);?></a> </li>
  <?php } } unset($arr);?>	
                </ul>
            </div>
              <?php include template('contact');?>
 
    </div> 
    <!-- s:右1 -->
    <div class="m_r">
        <div class="title1"><span class="fr">当前位置: <a href="<?php echo XQ_PATH;?>">首页</a> &gt; <?php echo $title;?></span><h2><?php echo $title;?></h2></div>
        <!--START:内容正文-->
        <div class="content-detail">
        <?php echo $content;?>
        </div>	

        <!--END:内容正文-->
        
    </div> 
    <!-- e:右1 -->
 
</div>
<?php include template('footer');?>