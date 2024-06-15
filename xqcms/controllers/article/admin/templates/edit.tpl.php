<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table class="tb">
<thead>
<th colspan="10"><?php echo $tname;?></th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl"><?php echo $MOD['name'];?>标题 <span class="f_red">*</span></td>
<td><input name="post[title]" type="text" id="title" size="60" value="<?php echo $title;?>"/> <?php echo color('post[color]', $color);?><br/><span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><?php echo $MOD['name'];?>位置属性 </td>
<td><?php echo posid_select_c('post[posid]', $posid);?></td>
</tr>
<tr>
<td class="tl">所属分类 <span class="f_red">*</span></td>
<td><?php echo $_admin == 1 ? category_select('post[catid]', '选择分类', $catid, $moduleid) : ajax_category_select('post[catid]', '选择分类', $catid, $moduleid);?>&nbsp;&nbsp;<input type="checkbox" name="post[islink]" value="1" id="islink" onclick="_islink();" <?php if($islink) echo 'checked';?>/> 外部链接 <span id="dcatid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">标题图片</td>
<td><input name="post[thumb]" id="thumb" type="text" size="60" value="<?php echo $thumb;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, $('#thumb').val());" class="jt">上传</span>&nbsp;&nbsp;<span onclick="_preview($('#thumb').val());" class="jt">预览</span>&nbsp;&nbsp;<span onclick="$('#thumb').val('');" class="jt">删除</span></td>
</tr>
<tr id="link" style="display:<?php echo $islink ? '' : 'none';?>;">
<td class="tl">链接地址 <span class="f_red">*</span></td>
<td><input name="post[url]" type="text" id="url" size="60" value="<?php echo $url;?>"/> <span id="durl" class="f_red"></span></td>
</tr>
<tbody id="basic" style="display:<?php echo $islink ? 'none' : '';?>;">
<tr>
<td class="tl">
<?php echo $MOD['name'];?>内容 <span class="f_red">*</span>
</td>
<td><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content','', '98%', 350);?><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl" height="30">内容选项</td>
<td>
<a href="javascript:pagebreak();"><img src="data/style/pagebreak.gif" align="absmiddle"/> 插入分页符</a>&nbsp;&nbsp;
<input type="checkbox" name="post[save_remotepic]" value="1"<?php if($MOD['save_remotepic']) echo 'checked';?>/>下载远程图片&nbsp;&nbsp;
<input type="checkbox" name="post[clear_link]" value="1"<?php if($MOD['clear_link']) echo 'checked';?>/>清除链接&nbsp;&nbsp;
截取内容 <input name="post[introduce_length]" type="text" size="2" value="<?php echo $MOD['introduce_length']?>"/> 字符至简介&nbsp;&nbsp;
设置内容第 <input name="post[thumb_no]" type="text" size="2" value=""/> 张图片为标题图
</td>
</tr>
</tbody>
<tr>
<td class="tl">关键词</td>
<td><input name="post[keyword]" type="text" size="60" value="<?php echo $keyword;?>"/><?php tips('多个关键词请用英文逗号隔开');?></td>
</tr>
<tr>
<td class="tl"><?php echo $MOD['name'];?>简介</td>
<td><textarea name="post[introduce]" style="width:80%;height:60px;"><?php echo $introduce;?></textarea></td>
</tr>
<tr height="30">
<td class="tl"><?php echo $MOD['name'];?>作者</td>
<td><input type="text" size="10" name="post[author]" value="<?php echo $author;?>"/>&nbsp;&nbsp;<?php echo $MOD['name'];?>来源 <input type="text" size="12" name="post[copyfrom]" value="<?php echo $copyfrom;?>"/>&nbsp;&nbsp;来源链接 <input type="text" size="25" name="post[fromurl]" value="<?php echo $fromurl;?>"/></td>
</tr>
<tr>
<td class="tl">添加人 </td>
<td><input name="post[username]" type="text"  size="20" value="<?php echo $username;?>" id="username"/> </td>
</tr>
<tr>
<td class="tl"><?php echo $MOD['name'];?>状态</td>
<td>
<input type="radio" name="post[status]" value="3" <?php if($status == 3) echo 'checked';?> id="status_3"/><label for="status_3"> 通过</label>
<input type="radio" name="post[status]" value="2" <?php if($status == 2) echo 'checked';?> id="status_2"/><label for="status_2">  待审</label>
<input type="radio" name="post[status]" value="0" <?php if($status == 0) echo 'checked';?> id="status_0"/><label for="status_0">  删除</label>
</td>
</tr>
<tr>
<td class="tl">添加时间</td>
<td><input type="text" size="22" name="post[addtime]" value="<?php echo $addtime;?>"/></td>
</tr>
<tr>
<td class="tl">浏览次数</td>
<td><input name="post[hits]" type="text" size="10" value="<?php echo $hits;?>"/></td>
</tr>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" 重 置 " class="btn"/></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'title';
	l = $("#"+f).val().length;
	if(l < 2) {
		Dmsg('标题最少2字，当前已输入'+l+'字', f);
		return false;
	}
	f = 'catid_1';
	if($("#"+f).val() == 0) {
		Dmsg('请选择所属分类', 'catid', 1);
		return false;
	}
	if($('#islink').attr("checked")) {
		f = 'url';
		l = $("#"+f).val().length;
		if(l < 12) {
			Dmsg('请输入正确的链接地址', f);
			return false;
		}
	} else {
		f = 'content';
		l = FCKLen();
		if(l < 5) {
			Dmsg('内容最少5字，当前已输入'+l+'字', f);
			return false;
		}
		
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(<?php echo $menuid;?>);</script>
</body>
</html>