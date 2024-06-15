<?php defined('IN_XQCMS') or exit('Access Denied');?><?php include template('header');?>

<div class="m mid clearfix">

    <div class="m_l">

        <div style="width:250px;">

        <div class="title1"><span class="fr more"><a href="<?php echo $MODULE['9']['url'];?>"><img src="<?php echo XQ_STYLE;?>images/more.jpg" alt=""/></a></span><h2>成功案例 <em>Success Stories</em></h2></div>

        <div class="bboby" style="height:172px;overflow:hidden;" id="marquee">

        <div id="marquee1">

                <ul>

                <?php $arr=lists("moduleid=9&condition=status=3&posid=1&pagesize=20&order=listorder desc,addtime desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>

              <li class="newslist"><a  

  href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['title'];?></a> </li>

  <?php } } unset($arr);?>	

                </ul>

              </div>

              <div id="marquee2"></div>

            </div>



              <div class="title2"><span class="fr more"><a href="<?php echo $MODULE['9']['url'];?>"><img src="<?php echo XQ_STYLE;?>images/more.jpg" alt=""/></a></span><h2>案例分类 <em>Case classification</em></h2></div>

              <div class="bboby">

                <ul>

             <?php $arr=type("moduleid=9&ismenu=1"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>

              <li class="newslist"><a  

  href="<?php echo $MODULE['9']['url'];?><?php echo $row['url'];?>"><?php echo set_style($row['catname'],$row['color']);?></a> </li>

  <?php } } unset($arr);?>	

                </ul>

            </div>

            



              <?php include template('contact');?>



    </div> 

    <!-- s:右1 -->

    <div class="m_r">

     <?php $arr=lists("table=onepage&condition=id=1&pagesize=1"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>

    <div class="title1"><span class="fr more"><a href="<?php echo $row['url'];?>"><img src="<?php echo XQ_STYLE;?>images/more.jpg" alt=""/></a></span><h2>公司简介 <em>Company Profile</em></h2></div>

    <div class="bboby">

    <p>

      <img src="<?php echo XQ_STYLE;?>images/about.gif" style="padding-right:10px;" align="left"/>  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo showShort(strip_tags($row['content']),600, '...');?><a href="<?php echo $row['url'];?>" target="_blank" style="color:#ff0000">[详细介绍]</a> 

      </p> 

    </div>

    <div class="clear"></div>

    <?php } } unset($arr);?>

      <div class="m_1_l">

             <div class="title2"><span class="fr more"><a href="<?php echo $MODULE['8']['url'];?>"><img src="<?php echo XQ_STYLE;?>images/more.jpg" alt=""/></a></span><h2>新闻资讯 <em>News</em></h2></div>

          <div class="bboby">

                <ul>

                <?php $arr=lists("moduleid=8&condition=status=3&posid=1&pagesize=15&order=listorder desc,addtime desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>

              <li class="newslist"><span class="fr"><?php echo date('m/d',$row['addtime']);?></span> <a  

  href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['title'];?></a> </li>

  <?php } } unset($arr);?>	

                </ul>

            </div>   

      </div>

        

        <div class="m_1_r">

            <div class="title2"><span class="fr more"><a href="<?php echo $MODULE['5']['url'];?>"><img src="<?php echo XQ_STYLE;?>images/more.jpg" alt=""/></a></span><h2>客户验厂 <em>Customer audits</em></h2></div>

            <div class="bboby">

                <ul>

                <?php $arr=lists("moduleid=5&condition=status=3&posid=1&pagesize=15&order=listorder desc,addtime desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>

                  <li class="newslist"><span class="fr"><?php echo date('m/d',$row['addtime']);?></span> <a  

  href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['title'];?></a> </li>

  <?php } } unset($arr);?>	

                </ul>

            </div>

            

        </div> 

              <div class="m_1_l mt10">

             <div class="title2"><span class="fr more"><a href="<?php echo $MODULE['10']['url'];?><?php echo $auth['11']['url'];?>"><img src="<?php echo XQ_STYLE;?>images/more.jpg" alt=""/></a></span><h2>体系认证咨询 <em>System certification</em></h2></div>

          <div class="bboby">

                <ul>

                <?php $arr=lists("moduleid=10&condition=status=3&posid=1&catid=11&pagesize=15&order=listorder desc,addtime desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>

                <li class="newslist"><span class="fr"><?php echo date('m/d',$row['addtime']);?></span> <a  

  href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['title'];?></a> </li>

  <?php } } unset($arr);?>	

                </ul>

            </div>   

      </div>

        

        <div class="m_1_r mt10">

            <div class="title2"><span class="fr more"><a href="<?php echo $MODULE['10']['url'];?><?php echo $auth['12']['url'];?>"><img src="<?php echo XQ_STYLE;?>images/more.jpg" alt=""/></a></span><h2>认证机构咨询 <em>Certification bodies</em></h2></div>

            <div class="bboby">

                <ul>

                <?php $arr=lists("moduleid=10&condition=status=3&posid=1&catid=12&pagesize=15&order=listorder desc,addtime desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>

                   <li class="newslist"><span class="fr"><?php echo date('m/d',$row['addtime']);?></span> <a  

  href="<?php echo $row['url'];?>" target="_blank" title="<?php echo $row['alt'];?>"><?php echo $row['title'];?></a> </li>

  <?php } } unset($arr);?>	

                </ul>

            </div>

            

        </div> 

        

    </div> 

    <!-- e:右1 -->



<div class="clear"></div>

<div class="piclink">

       <?php $arr=lists("table=link&condition=status=3 AND thumb<>''&pagesize=20&order=listorder desc,id desc"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>

                <a href="<?php echo $row['url'];?>" title="<?php echo $row['title'];?>" target="_blank"><img src="<?php echo $row['thumb'];?>" width="88" height="31"/></a> 

                 <?php } } unset($arr);?>   

            </div>

</div>

            <script>

var speed=30;

var colee2=document.getElementById("marquee2");

var colee1=document.getElementById("marquee1");

var colee=document.getElementById("marquee");

colee2.innerHTML=colee1.innerHTML;

function Marquee(){

if(colee2.offsetTop-colee.scrollTop<=0){

 colee.scrollTop-=colee1.offsetHeight;

 }else{

 colee.scrollTop++

}

}

var MyMar=setInterval(

Marquee,speed)

colee.onmouseover=function(

) {

clearInterval(

MyMar

)}

colee.onmouseout=function(

){MyMar=setInterval(

Marquee,speed)}

</script>

<?php include template('footer');?>