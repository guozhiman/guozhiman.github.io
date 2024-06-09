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
        <div class="title1"><span class="fr">当前位置: <a href="<?php echo XQ_PATH;?>">首页</a> &gt;在线留言</span><h2>在线留言</h2></div>
          <!--START:内容正文-->
<div class="content-detail">

 <form action="?" method="post" onSubmit="return check();">
			<table width="100%" cellpadding="8" cellspacing="8" >
            <tr> 
                            <td colspan="2" align="center"> <b>感谢您访问我们的网站，欢迎您给我们留言！</b></td>
                          </tr>

			<tr>
			<td  width="90" align="right"><span class="red">*</span> 留言主题&nbsp;&nbsp;</td>
			<td ><input type="text" name="post[title]"  size="40" id="title" value="<?php echo $title;?>" style="border:1px #CCCCCC solid"/>
			  <span id="dtitle" class="red"></span>			</td>
			</tr>
			<tr>
			<td  align="right"><span class="red">*</span> 留言内容&nbsp;&nbsp;</td>
			<td ><textarea name="post[content]" rows="5" cols="70" id="content" style="border:1px #CCCCCC solid"><?php echo $content;?></textarea><br/>
			<span id="dcontent" class="red"></span>			</td>
			</tr>
			<tr>
			<td  align="right"><span class="red">*</span> 姓名&nbsp;&nbsp;</td>
			<td >
			<input type="text" name="post[truename]"  size="10" style="border:1px #CCCCCC solid" id="truename" value=""/>&nbsp;
			<span id="dtruename" class="red"></span>			</td>
			</tr>
			
			<tr>
			<td  align="right"><span class="red">*</span> 电子邮件&nbsp;&nbsp;</td>
			<td >
			<input type="text" name="post[email]"  size="30" style="border:1px #CCCCCC solid" id="email" value=""/>
			<span id="demail" class="red"></span>			</td>
			</tr>
			<tr>
			<td  align="right"> 联系电话&nbsp;&nbsp;</td>
			<td >
			<input type="text" name="post[telephone]"  size="30" style="border:1px #CCCCCC solid" id="telephone" value=""/>
					</td>
			</tr>
			<tr>
			<td  align="right">QQ&nbsp;&nbsp;</td>
			<td ><input type="text" size="20" style="border:1px #CCCCCC solid" name="post[qq]" id="qq" value=""/></td>
			</tr>
			
			<tr>
			<td  align="right"><span class="red">*</span> 验证码&nbsp;&nbsp;</td>
			<td >
			 <input name="captcha" id="captcha" type="text" size="6" style="border:1px #CCCCCC solid; float:left; margin-right:10px;" onfocus="showcaptcha();" value="点击显示"  />&nbsp;<img src="<?php echo XQ_PATH;?>data/style/loading.gif" title="点击刷新&#10;不区分大小写" alt="" align="left" id="captchapng" onclick="reloadcaptcha();" style="display:none;cursor:pointer;"/>
			<span id="dcaptcha" class="red"></span>			</td>
			</tr>
			<tr>
			<td > </td>
			<td >
			<input type="submit" name="submit"  value=" 提交 " style="border:1px #CCCCCC solid"/>&nbsp;
			<input type="reset"  value=" 重写 " style="border:1px #CCCCCC solid"/>			</td>
			</tr>
			</table>
			</form>
            <a name="p"></a>
			<?php $arr=lists("table=guestbook&condition=status=3&pagesize=5&page=$page&showpage=1&order=id DESC"); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>
			<table width="100%" border=0 cellpadding=4 cellspacing=1 bgcolor=#EEEEEE style="padding:5px; margin-top:5px;">
			<tr> 
			<td height="26" colspan="2"><span class="fr">来着：<?php echo $row['ip'];?>----<?php echo ip2area($row['ip']);?></span>&nbsp;&nbsp;<?php echo $row['truename'];?> 于 <span class="font11"><?php echo date('Y-m-d',$row['addtime']);?></span> 发表了[ <font color="#ff6600"><?php echo $row['title'];?></font> ]</td>
			</tr>
			<tr>
			<td align="right"  width="15%" height="26">留言内容：&nbsp;&nbsp;</td>
			<td  class="lh18"><?php echo $row['content'];?></td>
			</tr>
			<tr bgcolor="#EEEEEE"> 
			<td align="right" height="26"  style="color:#444;">回复：&nbsp;&nbsp;</td>
			<td  style="color:#D9251D;"><?php if($row['reply']) { ?><?php echo $row['reply'];?><?php } else { ?>暂未回复<?php } ?></td>
			</tr>
			</table>
			<?php } } unset($arr);?>	
			<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>

  <script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'title';
	l = $("#"+f).val().length;
	if(l < 3 || l > 30) {
		Dmsg('标题应为3-30字，当前已输入'+l+'字', f);
		$("#"+f).focus();
		return false;
	}
	f = 'content';
	l = $("#"+f).val().length;
	if(l < 5 || l > 1000) {
		Dmsg('内容应为5-1000字，当前已输入'+l+'字', f);
		$("#"+f).focus();
		return false;
	}
	f = 'truename';
	l = $("#"+f).val().length;
	if(l < 2) {
		Dmsg('请填写姓名', f);
		$("#"+f).focus();
		return false;
	}
	f = 'email';
	l = $("#"+f).val().length;
	if(l < 7) {
		Dmsg('请填写电子邮件', f);
		$(f).focus();
		return false;
	}
	f = 'captcha';
	l = $("#"+f).val();
	if(l.length!=4) {
		Dmsg('请填写4位验证码', f);
		$("#"+f).focus();
		return false;
	}
	return true;
}
</script>       
</div>
<!--END:内容正文-->
        
    </div> 
    <!-- e:右1 -->
 
</div>
<?php include template('footer');?>